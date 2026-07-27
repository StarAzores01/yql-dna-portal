@extends('layouts.app')

@section('content')
<h1>Add External Link</h1>

<form method="POST" action="{{ route('admin.external-links.store') }}" class="form-card">
    @csrf

    <label for="title">Title <span class="muted">(displayed as the card heading)</span></label>
    <input type="text" id="title" name="title" value="{{ old('title') }}" required
           placeholder="e.g. ISO 45001 — Occupational Health &amp; Safety">

    <label for="url">URL</label>
    <input type="url" id="url" name="url" value="{{ old('url') }}" required
           placeholder="https://example.com">

    <label for="description">Description <span class="muted">(short summary shown on the card)</span></label>
    <textarea id="description" name="description" rows="3"
              placeholder="One or two sentences describing this resource.">{{ old('description') }}</textarea>

    <label for="category">Category <span class="muted">(groups cards together on the public page — use consistent names)</span></label>
    <input type="text" id="category" name="category" value="{{ old('category') }}" required
           placeholder="e.g. ISO and Compliance Resources"
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
            <option value="{{ $value }}" @selected(old('icon', 'globe') === $value)>{{ $label }}</option>
        @endforeach
    </select>

    <label for="sort_order">Display Order <span class="muted">(lower numbers appear first within a category)</span></label>
    <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}" min="0">

    <label for="status">Status</label>
    <select id="status" name="status" required>
        <option value="active"   @selected(old('status', 'active') === 'active')>Active — visible on the public page</option>
        <option value="inactive" @selected(old('status') === 'inactive')>Inactive — hidden</option>
    </select>

    <button type="submit" class="btn btn-primary btn-lg" style="margin-top:6px;">
        <x-icon name="check-circle" class="icon-sm" /> Add External Link
    </button>
</form>
@endsection
