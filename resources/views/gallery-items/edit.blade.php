@extends('layouts.app')

@section('content')
<h1>Edit Gallery Item</h1>

<form method="POST" action="{{ route('admin.gallery-items.update', $item) }}" enctype="multipart/form-data" class="form-card">
    @csrf
    @method('PUT')

    <label for="title">Title</label>
    <input type="text" id="title" name="title" value="{{ old('title', $item->title) }}" required>

    <label for="category">Category</label>
    <select id="category" name="category" required>
        @foreach(config('gallery_categories') as $slug => $label)
            <option value="{{ $slug }}" @selected(old('category', $item->category) === $slug)>{{ $label }}</option>
        @endforeach
    </select>

    <label for="description">Description <span class="muted">(optional)</span></label>
    <textarea id="description" name="description" rows="3">{{ old('description', $item->description) }}</textarea>

    <label for="topics">Topics <span class="muted">(optional — comma-separated, e.g. "Safety, Training")</span></label>
    <input type="text" id="topics" name="topics" value="{{ old('topics', $item->topics) }}" placeholder="e.g. Safety, Training">

    <label for="sort_order">Display Order <span class="muted">(lower numbers appear first)</span></label>
    <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', $item->sort_order) }}" min="0">

    <label for="status">Status</label>
    <select id="status" name="status" required>
        <option value="active"   @selected(old('status', $item->status) === 'active')>Active — visible on the public page</option>
        <option value="inactive" @selected(old('status', $item->status) === 'inactive')>Inactive — hidden</option>
    </select>

    @if($item->image_path)
        <p><img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->title }}" style="max-width:200px;border-radius:6px;"></p>
    @endif
    <label for="image">Replace Photo <span class="muted">(JPG, PNG, WebP, or GIF — max 5 MB; leave empty to keep current)</span></label>
    <input type="file" id="image" name="image" accept=".jpg,.jpeg,.png,.webp,.gif">

    <button type="submit" class="btn btn-primary btn-lg" style="margin-top:6px;"><x-icon name="save" class="icon-sm" /> Save Changes</button>
</form>
@endsection
