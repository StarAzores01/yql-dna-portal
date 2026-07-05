<?php

namespace App\Http\Controllers;

use App\Models\GalleryItem;
use App\Services\AuditLogService;
use App\Support\HandlesPublicImageUpload;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GalleryItemController extends Controller
{
    use HandlesPublicImageUpload;

    public function index()
    {
        $galleryItems = GalleryItem::orderBy('sort_order')->orderBy('title')->paginate(20);

        return view('gallery-items.index', compact('galleryItems'));
    }

    public function create()
    {
        return view('gallery-items.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validated($request);

        if ($request->hasFile('image')) {
            $validated['image_path'] = $this->storePublicImage($request->file('image'), 'gallery');
        }

        $item = GalleryItem::create($validated);

        AuditLogService::log($request->user()->id, 'gallery_item_create', 'Created gallery item #'.$item->id.' ('.$item->title.')', $request);

        return redirect()->route('admin.gallery-items.index')->with('success', 'Gallery item added.');
    }

    public function edit(GalleryItem $item)
    {
        return view('gallery-items.edit', ['item' => $item]);
    }

    public function update(Request $request, GalleryItem $item)
    {
        $validated = $this->validated($request);

        if ($request->hasFile('image')) {
            $this->deletePublicImage($item->image_path);
            $validated['image_path'] = $this->storePublicImage($request->file('image'), 'gallery');
        }

        $item->update($validated);

        AuditLogService::log($request->user()->id, 'gallery_item_update', 'Updated gallery item #'.$item->id.' ('.$item->title.')', $request);

        return redirect()->route('admin.gallery-items.index')->with('success', 'Gallery item updated.');
    }

    public function destroy(Request $request, GalleryItem $item)
    {
        $this->deletePublicImage($item->image_path);

        AuditLogService::log($request->user()->id, 'gallery_item_delete', 'Deleted gallery item #'.$item->id.' ('.$item->title.')', $request);
        $item->delete();

        return redirect()->route('admin.gallery-items.index')->with('success', 'Gallery item deleted.');
    }

    private function validated(Request $request): array
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', Rule::in(array_keys(config('gallery_categories')))],
            'description' => ['nullable', 'string', 'max:2000'],
            'topics' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'status' => ['required', Rule::in(['active', 'inactive'])],
            'image' => $this->imageUploadRules,
        ]);

        unset($validated['image']);
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        return $validated;
    }
}
