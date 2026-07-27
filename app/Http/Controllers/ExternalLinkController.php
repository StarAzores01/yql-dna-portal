<?php

namespace App\Http\Controllers;

use App\Models\ExternalLink;
use App\Services\AuditLogService;
use App\Support\HandlesPublicImageUpload;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ExternalLinkController extends Controller
{
    use HandlesPublicImageUpload;

    // Icon choices that map to the x-icon component
    public const ICONS = [
        'check-circle'   => 'Check Circle (ISO / Compliance)',
        'alert-triangle' => 'Alert / Safety / Warning',
        'globe'          => 'Globe (General / Web)',
        'book-open'      => 'Book (Training / Education)',
        'tool'           => 'Tool (Equipment / Maintenance)',
        'link'           => 'Link',
        'info'           => 'Info',
        'file-text'      => 'Document',
        'briefcase'      => 'Briefcase (Industry / Business)',
        'award'          => 'Award (Standards / Recognition)',
    ];

    public function index()
    {
        $links = ExternalLink::orderBy('category')->orderBy('sort_order')->orderBy('title')->paginate(25);

        return view('external-links.index', compact('links'));
    }

    public function create()
    {
        return view('external-links.create', ['icons' => self::ICONS]);
    }

    public function store(Request $request)
    {
        $validated = $this->validated($request);
        $validated['slug']       = ExternalLink::uniqueSlugFrom($validated['title']);
        $validated['created_by'] = $request->user()->id;

        if ($request->hasFile('logo')) {
            $validated['logo_path'] = $this->storePublicImage($request->file('logo'), 'ext-links');
        }

        $link = ExternalLink::create($validated);

        AuditLogService::log(
            $request->user()->id,
            'external_link_create',
            'Created external link #' . $link->id . ' (' . $link->title . ')',
            $request
        );

        return redirect()->route('admin.external-links.index')->with('success', 'External link entry created.');
    }

    public function edit(ExternalLink $externalLink)
    {
        return view('external-links.edit', [
            'link'  => $externalLink,
            'icons' => self::ICONS,
        ]);
    }

    public function update(Request $request, ExternalLink $externalLink)
    {
        $validated = $this->validated($request);

        if ($validated['title'] !== $externalLink->title) {
            $validated['slug'] = ExternalLink::uniqueSlugFrom($validated['title'], $externalLink->id);
        }

        if ($request->hasFile('logo')) {
            $this->deletePublicImage($externalLink->logo_path);
            $validated['logo_path'] = $this->storePublicImage($request->file('logo'), 'ext-links');
        }

        $externalLink->update($validated);

        AuditLogService::log(
            $request->user()->id,
            'external_link_update',
            'Updated external link #' . $externalLink->id . ' (' . $externalLink->title . ')',
            $request
        );

        return redirect()->route('admin.external-links.index')->with('success', 'External link entry updated.');
    }

    public function destroy(Request $request, ExternalLink $externalLink)
    {
        $this->deletePublicImage($externalLink->logo_path);

        AuditLogService::log(
            $request->user()->id,
            'external_link_delete',
            'Deleted external link #' . $externalLink->id . ' (' . $externalLink->title . ')',
            $request
        );

        $externalLink->delete();

        return redirect()->route('admin.external-links.index')->with('success', 'External link entry deleted.');
    }

    private function validated(Request $request): array
    {
        $validated = $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'category'    => ['required', 'string', 'max:255'],
            'url'         => ['required', 'url', 'max:2048'],
            'link_label'  => ['nullable', 'string', 'max:100'],
            'icon'        => ['required', Rule::in(array_keys(self::ICONS))],
            'excerpt'     => ['nullable', 'string', 'max:2000'],
            'content'     => ['nullable', 'string'],
            'note'        => ['nullable', 'string', 'max:1000'],
            'topics'      => ['nullable', 'string', 'max:255'],
            'sort_order'  => ['nullable', 'integer', 'min:0'],
            'status'      => ['required', Rule::in(['draft', 'published'])],
            'logo'        => $this->imageUploadRules,
        ]);

        unset($validated['logo']);
        $validated['sort_order'] = $validated['sort_order'] ?? 0;

        return $validated;
    }
}
