@extends('layouts.app')

@section('content')
<h1>External Links</h1>

<div class="instruction-panel">
    <button class="instruction-panel-toggle" aria-expanded="false" aria-controls="help-ext-links">
        <span><x-icon name="info" class="icon-sm" /> How to use this page</span>
        <span class="instruction-chevron">▼</span>
    </button>
    <div class="instruction-panel-body" id="help-ext-links">
        <p><strong>Manage the External Links page</strong> shown publicly at <code>/external-links</code>.</p>
        <ul>
            <li>Each entry represents a company, institution, organisation, or resource shown as a card on the public page.</li>
            <li><strong>Category</strong> groups cards together — use identical spelling to keep entries in the same group.</li>
            <li><strong>Draft</strong> entries are saved but not shown publicly. <strong>Published</strong> entries appear immediately.</li>
            <li>The <strong>Content</strong> field supports rich text — use it for detailed company overviews, governance notes, ownership structure, etc.</li>
            <li>Deleting an entry is permanent and removes its logo.</li>
        </ul>
    </div>
</div>

<a href="{{ route('admin.external-links.create') }}" class="btn btn-primary" style="margin-bottom:14px;">+ New Entry</a>

<table class="data-table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Category</th>
            <th>URL</th>
            <th>Order</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @forelse($links as $link)
        <tr>
            <td>{{ $link->title }}</td>
            <td>{{ $link->category }}</td>
            <td>
                <a href="{{ $link->url }}" target="_blank" rel="noopener noreferrer" class="muted" style="font-size:.85rem;word-break:break-all;">
                    {{ Str::limit($link->url, 45) }}
                </a>
            </td>
            <td>{{ $link->sort_order }}</td>
            <td>{{ ucfirst($link->status) }}</td>
            <td>
                <div class="action-btn-group">
                    <a href="{{ route('admin.external-links.edit', $link) }}" class="btn-action btn-edit-user">
                        <x-icon name="edit" class="icon-sm" /> Edit
                    </a>
                    <form method="POST" action="{{ route('admin.external-links.destroy', $link) }}" style="display:inline"
                          data-confirm="This will permanently remove this entry and its logo image."
                          data-confirm-title="Delete &quot;{{ $link->title }}&quot;?">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn-action btn-delete">
                            <x-icon name="trash" class="icon-sm" /> Delete
                        </button>
                    </form>
                </div>
            </td>
        </tr>
    @empty
        <tr><td colspan="6">No entries yet. <a href="{{ route('admin.external-links.create') }}">Add the first one</a>.</td></tr>
    @endforelse
    </tbody>
</table>

{{ $links->links() }}
@endsection
