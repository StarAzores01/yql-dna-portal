@extends('layouts.app')

@section('content')
<h1>Upload Document</h1>

<form method="POST" action="{{ route('documents.store') }}" enctype="multipart/form-data" class="form-card">
    @csrf

    <label for="title">Title</label>
    <input type="text" id="title" name="title" value="{{ old('title') }}" required>

    <label for="description">Description</label>
    <textarea id="description" name="description" rows="3">{{ old('description') }}</textarea>

    <label for="category_id">Category</label>
    <select id="category_id" name="category_id" required>
        <option value="">Select category</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>{{ $category->name }}</option>
        @endforeach
    </select>

    <label for="access_level">Access Level</label>
    <select id="access_level" name="access_level" required>
        @foreach(['all','staff','manager','auditor','admin'] as $level)
            <option value="{{ $level }}">{{ ucfirst($level) }}</option>
        @endforeach
    </select>

    <label for="status">Status</label>
    <select id="status" name="status" required>
        <option value="active">Active</option>
        <option value="archived">Archived</option>
    </select>

    <label for="file">File (pdf, doc, docx, xls, xlsx, ppt, pptx, jpg, png &mdash; max 10MB)</label>
    <input type="file" id="file" name="file" required>

    <button type="submit" class="btn btn-primary">Upload</button>
</form>
@endsection
