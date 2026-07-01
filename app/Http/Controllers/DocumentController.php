<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Document;
use App\Services\AuditLogService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class DocumentController extends Controller
{
    protected array $allowedExtensions = [
        // Documents
        'pdf', 'doc', 'docx', 'xls', 'xlsx', 'ppt', 'pptx',
        // OpenDocument
        'odt', 'ods', 'odp',
        // Text & data
        'txt', 'rtf', 'csv', 'xml', 'json',
        // Images
        'jpg', 'jpeg', 'png', 'gif', 'bmp', 'webp', 'svg', 'tiff', 'tif',
        // Archives
        'zip', 'rar', '7z',
        // Video
        'mp4', 'mov', 'avi', 'wmv', 'mkv', 'webm',
        // Audio
        'mp3', 'wav', 'aac', 'ogg', 'm4a',
    ];

    protected int $maxFileSizeKb = 102400; // 100 MB

    public function index(Request $request)
    {
        $user = $request->user();

        $query = Document::with(['category', 'uploader'])->viewableBy($user);

        $status = $request->query('status', 'active');
        if (in_array($status, ['active', 'archived'], true)) {
            $query->where('status', $status);
        }
        // any other value (e.g. "all") leaves the status unfiltered

        if ($search = $request->query('search')) {
            // ILIKE is PostgreSQL-specific (this project is Postgres-only, see CLAUDE.md)
            // and gives case-insensitive matching across title, description, and filename.
            $query->where(function ($q) use ($search) {
                $q->where('title', 'ilike', "%{$search}%")
                    ->orWhere('description', 'ilike', "%{$search}%")
                    ->orWhere('file_name', 'ilike', "%{$search}%");
            });
        }

        if ($categoryId = $request->query('category_id')) {
            $query->where('category_id', $categoryId);
        }

        if ($user->isAdmin() && $accessLevel = $request->query('access_level')) {
            $query->where('access_level', $accessLevel);
        }

        match ($request->query('sort', 'newest')) {
            'oldest' => $query->oldest(),
            'title_asc' => $query->orderBy('title'),
            'title_desc' => $query->orderByDesc('title'),
            'size_desc' => $query->orderByDesc('file_size'),
            'size_asc' => $query->orderBy('file_size'),
            default => $query->latest(),
        };

        $documents = $query->paginate(15)->withQueryString();
        $categories = Category::orderBy('name')->get();

        return view('documents.index', compact('documents', 'categories'));
    }

    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view('documents.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:2000'],
            'category_id' => ['required', 'exists:categories,id'],
            'access_level' => ['required', Rule::in(['staff', 'manager', 'auditor', 'admin', 'all'])],
            'status' => ['required', Rule::in(['active', 'archived'])],
            'file' => [
                'required',
                'file',
                'max:'.$this->maxFileSizeKb,
                'mimes:'.implode(',', $this->allowedExtensions),
            ],
        ]);

        $file = $request->file('file');
        $extension = strtolower($file->getClientOriginalExtension());
        $storedPath = $file->store('documents', 'private'); // private disk, see config/filesystems.php

        $document = Document::create([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? null,
            'category_id' => $validated['category_id'],
            'file_name' => $file->getClientOriginalName(),
            'file_path' => $storedPath,
            'file_type' => $extension,
            'file_size' => $file->getSize(),
            'uploaded_by' => $request->user()->id,
            'access_level' => $validated['access_level'],
            'status' => $validated['status'],
        ]);

        AuditLogService::log($request->user()->id, 'document_upload', 'Uploaded document #'.$document->id.' ('.$document->title.')', $request);

        return redirect()->route('documents.index')->with('success', 'Document uploaded successfully.');
    }

    public function download(Request $request, Document $document)
    {
        $user = $request->user();

        if (! in_array($document->access_level, $user->viewableAccessLevels(), true)) {
            AuditLogService::log($user->id, 'document_download_denied', 'Denied download of document #'.$document->id, $request);
            abort(403, 'You are not authorized to download this document.');
        }

        if (! Storage::disk('private')->exists($document->file_path)) {
            abort(404, 'File not found on server.');
        }

        AuditLogService::log($user->id, 'document_download', 'Downloaded document #'.$document->id.' ('.$document->title.')', $request);

        return Storage::disk('private')->download($document->file_path, $document->file_name);
    }

    public function archive(Request $request, Document $document)
    {
        $document->update(['status' => 'archived']);
        AuditLogService::log($request->user()->id, 'document_archive', 'Archived document #'.$document->id, $request);

        return redirect()->route('documents.index')->with('success', 'Archived successfully.');
    }

    public function restore(Request $request, Document $document)
    {
        $document->update(['status' => 'active']);
        AuditLogService::log($request->user()->id, 'document_restore', 'Restored document #'.$document->id, $request);

        return redirect()->route('documents.index')->with('success', 'Restored successfully.');
    }

    public function destroy(Request $request, Document $document)
    {
        if (Storage::disk('private')->exists($document->file_path)) {
            Storage::disk('private')->delete($document->file_path);
        }

        AuditLogService::log($request->user()->id, 'document_delete', 'Deleted document #'.$document->id.' ('.$document->title.')', $request);
        $document->delete();

        return redirect()->route('documents.index')->with('success', 'Deleted successfully.');
    }
}
