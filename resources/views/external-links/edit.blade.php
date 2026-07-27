@extends('layouts.app')

@section('content')
<h1>Edit External Link</h1>

<form method="POST" action="{{ route('admin.external-links.update', $link) }}" class="form-card">
    @csrf
    @method('PUT')

    <label for="title">Title</label>
    <input type="text" id="title" name="title" value="{{ old('title', $link->title) }}" required>

    <label for="url">URL</label>
    <input type="url" id="url" name="url" value="{{ old('url', $link->url) }}" required>

    <label for="description">Description</label>
    <textarea id="description" name="description" rows="4">{{ old('description', $link->description) }}</textarea>

    <label for="category">Category</label>
    <input type="text" id="category" name="category" value="{{ old('category', $link->category) }}" required
           list="category-suggestions">
    <datalist id="category-suggestions">
        <option value="ISO and Compliance Resources">
        <option value="Safety and Workplace Standards">
        <option value="Environmental Management">
        <option value="Training and Skills Development Resources">
        <option value="Equipment and Maintenance Resources">
        <option value="Mining and Construction Industry References">
    </datalist>

    <label for="icon">Icon</label>
    <select id="icon" name="icon" required>
        @foreach($icons as $value => $label)
            <option value="{{ $value }}" @selected(old('icon', $link->icon) === $value)>{{ $label }}</option>
        @endforeach
    </select>

    <label for="sort_order">Display Order <span class="muted">(lower numbers appear first within a category)</span></label>
    <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', $link->sort_order) }}" min="0">

    <label for="status">Status</label>
    <select id="status" name="status" required>
        <option value="active"   @selected(old('status', $link->status) === 'active')>Active — visible on the public page</option>
        <option value="inactive" @selected(old('status', $link->status) === 'inactive')>Inactive — hidden</option>
    </select>

    <button type="submit" class="btn btn-primary btn-lg" style="margin-top:6px;">
        <x-icon name="save" class="icon-sm" /> Save Changes
    </button>
</form>
@endsection
