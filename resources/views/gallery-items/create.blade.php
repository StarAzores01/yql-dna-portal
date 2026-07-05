@extends('layouts.app')

@section('content')
<h1>Add Gallery Item</h1>

<form method="POST" action="{{ route('admin.gallery-items.store') }}" enctype="multipart/form-data" class="form-card">
    @csrf

    <label for="title">Title</label>
    <input type="text" id="title" name="title" value="{{ old('title') }}" required placeholder="e.g. Scheduled Servicing">

    <label for="category">Category</label>
    <select id="category" name="category" required>
        @foreach(config('gallery_categories') as $slug => $label)
            <option value="{{ $slug }}" @selected(old('category') === $slug)>{{ $label }}</option>
        @endforeach
    </select>

    <label for="description">Description <span class="muted">(optional)</span></label>
    <textarea id="description" name="description" rows="3">{{ old('description') }}</textarea>

    <label for="topics">Topics <span class="muted">(optional — comma-separated, e.g. "Safety, Training")</span></label>
    <input type="text" id="topics" name="topics" value="{{ old('topics') }}" placeholder="e.g. Safety, Training">

    <label for="sort_order">Display Order <span class="muted">(lower numbers appear first)</span></label>
    <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}" min="0">

    <label for="status">Status</label>
    <select id="status" name="status" required>
        <option value="active"   @selected(old('status', 'active') === 'active')>Active — visible on the public page</option>
        <option value="inactive" @selected(old('status') === 'inactive')>Inactive — hidden</option>
    </select>

    <label for="image">Photo <span class="muted">(JPG, PNG, WebP, or GIF — max 5 MB)</span></label>
    <input type="file" id="image" name="image" accept=".jpg,.jpeg,.png,.webp,.gif">

    <button type="submit" class="btn btn-primary btn-lg" style="margin-top:6px;"><x-icon name="check-circle" class="icon-sm" /> Add Gallery Item</button>
</form>
@endsection
