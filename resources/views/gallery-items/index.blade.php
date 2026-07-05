@extends('layouts.app')

@section('content')
<h1>Project Gallery</h1>

<div class="instruction-panel">
    <button class="instruction-panel-toggle" aria-expanded="false" aria-controls="help-gallery">
        <span><x-icon name="info" class="icon-sm" /> How to use this page</span>
        <span class="instruction-chevron">▼</span>
    </button>
    <div class="instruction-panel-body" id="help-gallery">
        <p><strong>Manage the Project Gallery page</strong> shown publicly at <code>/project-gallery</code>.</p>
        <ul>
            <li><strong>Category:</strong> Controls which filter button the item appears under on the public page.</li>
            <li><strong>Topics:</strong> Optional freeform tags shown on the item and used for the topic filter.</li>
            <li><strong>Order:</strong> Items are listed by the Order number, lowest first, then by title.</li>
            <li><strong>Status:</strong> <em>Inactive</em> items are hidden from the public page but kept here.</li>
            <li>Deleting an item removes its photo permanently.</li>
        </ul>
    </div>
</div>

<a href="{{ route('admin.gallery-items.create') }}" class="btn btn-primary" style="margin-bottom:14px;">+ Add Gallery Item</a>

<table class="data-table">
    <thead>
        <tr>
            <th>Photo</th>
            <th>Title</th>
            <th>Category</th>
            <th>Order</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @forelse($galleryItems as $item)
        <tr>
            <td>
                @if($item->image_path)
                    <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->title }}" style="width:56px;height:44px;object-fit:cover;border-radius:6px;">
                @else
                    <span class="muted">No photo</span>
                @endif
            </td>
            <td>{{ $item->title }}</td>
            <td>{{ $item->categoryLabel() }}</td>
            <td>{{ $item->sort_order }}</td>
            <td>{{ ucfirst($item->status) }}</td>
            <td>
                <div class="action-btn-group">
                    <a href="{{ route('admin.gallery-items.edit', $item) }}" class="btn-action btn-edit-user"><x-icon name="edit" class="icon-sm" /> Edit</a>
                    <form method="POST" action="{{ route('admin.gallery-items.destroy', $item) }}" style="display:inline"
                          data-confirm="This will permanently remove this gallery item and its photo."
                          data-confirm-title="Delete {{ $item->title }}?">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn-action btn-delete"><x-icon name="trash" class="icon-sm" /> Delete</button>
                    </form>
                </div>
            </td>
        </tr>
    @empty
        <tr><td colspan="6">No gallery items yet.</td></tr>
    @endforelse
    </tbody>
</table>

{{ $galleryItems->links() }}
@endsection
