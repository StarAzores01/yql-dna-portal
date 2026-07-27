@extends('layouts.app')

@section('content')
<h1>External Links</h1>

<div class="instruction-panel">
    <button class="instruction-panel-toggle" aria-expanded="false" aria-controls="help-ext-links">
        <span><x-icon name="info" class="icon-sm" /> How to use this page</span>
        <span class="instruction-chevron">▼</span>
    </button>
    <div class="instruction-panel-body" id="help-ext-links">
        <p><strong>Manage the external links</strong> displayed publicly at <code>/external-links</code>.</p>
        <ul>
            <li><strong>Category:</strong> Links are grouped by category on the public page. Use consistent category names to keep groups together.</li>
            <li><strong>Order:</strong> Within each category, links are shown by Order number (lowest first), then alphabetically by title.</li>
            <li><strong>Status:</strong> <em>Inactive</em> links are hidden from the public page but kept here for reference.</li>
            <li>Deleting a link is permanent and cannot be undone.</li>
        </ul>
    </div>
</div>

<a href="{{ route('admin.external-links.create') }}" class="btn btn-primary" style="margin-bottom:14px;">+ Add External Link</a>

<table class="data-table">
    <thead>
        <tr>
            <th>Icon</th>
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
            <td><x-icon name="{{ $link->icon }}" class="icon-sm" /></td>
            <td>{{ $link->title }}</td>
            <td>{{ $link->category }}</td>
            <td>
                <a href="{{ $link->url }}" target="_blank" rel="noopener noreferrer" class="muted" style="font-size:.85rem;word-break:break-all;">
                    {{ Str::limit($link->url, 50) }}
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
                          data-confirm="This will permanently remove this external link."
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
        <tr><td colspan="7">No external links yet. <a href="{{ route('admin.external-links.create') }}">Add one now</a>.</td></tr>
    @endforelse
    </tbody>
</table>

{{ $links->links() }}
@endsection
