@extends('layouts.app')

@section('content')
<h1>Documents</h1>

<form method="GET" action="{{ route('documents.index') }}" class="filter-bar">
    <input type="text" name="search" placeholder="Search documents..." value="{{ request('search') }}">
    <select name="category_id">
        <option value="">All Categories</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" @selected(request('category_id') == $category->id)>{{ $category->name }}</option>
        @endforeach
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

@if(auth()->user()->role === 'admin')
    <a href="{{ route('documents.create') }}" class="btn btn-primary">Upload Document</a>
@endif

<table class="data-table">
    <thead>
        <tr>
            <th>Title</th><th>Category</th><th>Access Level</th><th>Size</th><th>Status</th><th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @foreach($documents as $doc)
        <tr>
            <td>{{ $doc->title }}<br><small class="muted">{{ $doc->description }}</small></td>
            <td>{{ $doc->category->name }}</td>
            <td><span class="badge">{{ ucfirst($doc->access_level) }}</span></td>
            <td>{{ $doc->humanFileSize() }}</td>
            <td>{{ ucfirst($doc->status) }}</td>
            <td>
                <a href="{{ route('documents.download', $doc) }}">Download</a>
                @if(auth()->user()->role === 'admin')
                    | <form method="POST" action="{{ route('documents.archive', $doc) }}" style="display:inline">
                        @csrf @method('PATCH')
                        <button type="submit" class="btn-link">Archive</button>
                    </form>
                    | <form method="POST" action="{{ route('documents.destroy', $doc) }}" style="display:inline" onsubmit="return confirm('Delete this document permanently?')">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn-link btn-link-danger">Delete</button>
                    </form>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

{{ $documents->links() }}
@endsection
