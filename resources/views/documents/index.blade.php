@extends('layouts.app')

@section('content')
<h1>Documents</h1>

<div class="instruction-panel">
    <button class="instruction-panel-toggle" aria-expanded="false" aria-controls="help-documents">
        <span><x-icon name="info" class="icon-sm" /> How to use this page</span>
        <span class="instruction-chevron">▼</span>
    </button>
    <div class="instruction-panel-body" id="help-documents">
        <p><strong>This is the Documents Library.</strong> Browse, search, and manage company files here.</p>
        <ul>
            <li><strong>Search:</strong> Type a keyword in the search box and click <em>Filter</em> to find documents by title or description.</li>
            <li><strong>Download:</strong> Click the dark <em>Download</em> button to save a file to your computer. A green <em>Downloaded</em> badge will appear after you have downloaded a file.</li>
            <li><strong>Archive:</strong> Hides the document from active view. The file is not deleted — it can be restored at any time by filtering for Archived status.</li>
            <li><strong>Delete:</strong> Permanently removes the file from the system. You will be asked to confirm before anything is deleted.</li>
            <li>Use the <em>Status</em> filter to switch between Active, Archived, or All documents.</li>
        </ul>
    </div>
</div>

<form method="GET" action="{{ route('documents.index') }}" class="filter-bar">
    <input type="text" name="search" placeholder="Search by title, filename, or description..." value="{{ request('search') }}">
    <select name="category_id">
        <option value="">All Categories</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" @selected(request('category_id') == $category->id)>{{ $category->name }}</option>
        @endforeach
    </select>
    <select name="status">
        <option value="active"   @selected(request('status', 'active') === 'active')>Active</option>
        <option value="archived" @selected(request('status') === 'archived')>Archived</option>
        <option value="all"      @selected(request('status') === 'all')>All Statuses</option>
    </select>
    <select name="sort">
        <option value="newest"     @selected(request('sort', 'newest') === 'newest')>Newest First</option>
        <option value="oldest"     @selected(request('sort') === 'oldest')>Oldest First</option>
        <option value="title_asc"  @selected(request('sort') === 'title_asc')>Title (A&ndash;Z)</option>
        <option value="title_desc" @selected(request('sort') === 'title_desc')>Title (Z&ndash;A)</option>
        <option value="size_desc"  @selected(request('sort') === 'size_desc')>Largest File</option>
        <option value="size_asc"   @selected(request('sort') === 'size_asc')>Smallest File</option>
    </select>
    @if(auth()->user()->role === 'admin')
        <select name="access_level">
            <option value="">All Access Levels</option>
            @foreach(['all','staff','manager','auditor','admin'] as $level)
                <option value="{{ $level }}" @selected(request('access_level') == $level)>{{ ucfirst($level) }}</option>
            @endforeach
        </select>
    @endif
    <button type="submit" class="btn btn-secondary">Filter</button>
</form>

<a href="{{ route('documents.create') }}" class="btn btn-primary" style="margin-bottom:12px;">+ Upload Document</a>

<table class="data-table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Category</th>
            <th>Access Level</th>
            <th>Size</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($documents as $doc)
        <tr>
            <td>
                {{ $doc->title }}
                <br><small class="muted">{{ $doc->description }}</small>
            </td>
            <td>{{ $doc->category->name }}</td>
            <td><span class="badge">{{ ucfirst($doc->access_level) }}</span></td>
            <td>{{ $doc->humanFileSize() }}</td>
            <td>{{ ucfirst($doc->status) }}</td>
            <td>
                <div class="action-btn-group">
                    <a href="{{ route('documents.download', $doc) }}"
                       class="btn-action btn-download"
                       data-download-id="{{ $doc->id }}">
                        <x-icon name="download" class="icon-sm" /> Download
                    </a>

                    @if($doc->status === 'archived')
                        <form method="POST" action="{{ route('documents.restore', $doc) }}" style="display:inline">
                            @csrf @method('PATCH')
                            <button type="submit" class="btn-action btn-restore"><x-icon name="restore" class="icon-sm" /> Restore</button>
                        </form>
                    @else
                        <form method="POST" action="{{ route('documents.archive', $doc) }}" style="display:inline"
                              data-confirm="This will hide the document from active view. You can restore it at any time."
                              data-confirm-title="Archive this document?">
                            @csrf @method('PATCH')
                            <button type="submit" class="btn-action btn-archive"><x-icon name="archive" class="icon-sm" /> Archive</button>
                        </form>
                    @endif

                    <form method="POST" action="{{ route('documents.destroy', $doc) }}" style="display:inline"
                          data-confirm="The file will be permanently removed and cannot be recovered."
                          data-confirm-title="Delete this document?">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn-action btn-delete"><x-icon name="trash" class="icon-sm" /> Delete</button>
                    </form>
                </div>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $documents->links() }}
@endsection
