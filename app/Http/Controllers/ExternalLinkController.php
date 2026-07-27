<?php

namespace App\Http\Controllers;

use App\Models\ExternalLink;
use App\Services\AuditLogService;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ExternalLinkController extends Controller
{
    // Available icon choices that map to the x-icon component
    public const ICONS = [
        'check-circle'   => 'Check Circle',
        'alert-triangle' => 'Alert / Warning',
        'globe'          => 'Globe',
        'book-open'      => 'Book / Training',
        'tool'           => 'Tool / Equipment',
        'link'           => 'Link',
        'info'           => 'Info',
        'file-text'      => 'Document',
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

        $link = ExternalLink::create($validated);

        AuditLogService::log(
            $request->user()->id,
            'external_link_create',
            'Created external link #' . $link->id . ' (' . $link->title . ')',
            $request
        );

        return redirect()->route('admin.external-links.index')->with('success', 'External link added.');
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

        $externalLink->update($validated);

        AuditLogService::log(
            $request->user()->id,
            'external_link_update',
            'Updated external link #' . $externalLink->id . ' (' . $externalLink->title . ')',
            $request
        );

        return redirect()->route('admin.external-links.index')->with('success', 'External link updated.');
    }

    public function destroy(Request $request, ExternalLink $externalLink)
    {
        AuditLogService::log(
            $request->user()->id,
            'external_link_delete',
            'Deleted external link #' . $externalLink->id . ' (' . $externalLink->title . ')',
            $request
        );

        $externalLink->delete();

        return redirect()->route('admin.external-links.index')->with('success', 'External link deleted.');
    }

    private function validated(Request $request): array
    {
        return $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'url'         => ['required', 'url', 'max:2048'],
            'description' => ['nullable', 'string', 'max:5000'],
            'category'    => ['required', 'string', 'max:255'],
            'icon'        => ['required', Rule::in(array_keys(self::ICONS))],
            'sort_order'  => ['nullable', 'integer', 'min:0'],
            'status'      => ['required', Rule::in(['active', 'inactive'])],
        ]) + ['sort_order' => 0];
    }
}
