@extends('layouts.app')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
@endsection

@section('content')
<h1>New External Link Entry</h1>

<form method="POST" action="{{ route('admin.external-links.store') }}" enctype="multipart/form-data" class="form-card">
    @csrf

    {{-- ── Core identity ── --}}
    <label for="title">Name / Title</label>
    <input type="text" id="title" name="title" value="{{ old('title') }}" required
           placeholder="e.g. Guangxi Liugong Machinery Co., Ltd.">

    <label for="category">Category <span class="muted">(groups this entry with others on the public page — use consistent spelling)</span></label>
    <input type="text" id="category" name="category" value="{{ old('category') }}" required
           placeholder="e.g. Equipment and Maintenance Resources"
           list="category-suggestions">
    <datalist id="category-suggestions">
        <option value="ISO and Compliance Resources">
        <option value="Safety and Workplace Standards">
        <option value="Environmental Management">
        <option value="Training and Skills Development Resources">
        <option value="Equipment and Maintenance Resources">
        <option value="Mining and Construction Industry References">
    </datalist>

    {{-- ── Link details ── --}}
    <label for="url">Website URL</label>
    <input type="url" id="url" name="url" value="{{ old('url') }}" required
           placeholder="https://www.example.com">

    <label for="link_label">Link Button Label <span class="muted">(optional — defaults to "Visit Site" if left empty)</span></label>
    <input type="text" id="link_label" name="link_label" value="{{ old('link_label') }}"
           placeholder="e.g. Visit LiuGong &rsaquo;">

    {{-- ── Card appearance ── --}}
    <label for="icon">Card Icon</label>
    <select id="icon" name="icon" required>
        @foreach($icons as $value => $label)
            <option value="{{ $value }}" @selected(old('icon', 'globe') === $value)>{{ $label }}</option>
        @endforeach
    </select>

    <label for="logo">Logo / Brand Image <span class="muted">(optional — JPG, PNG, WebP, or GIF, max 5 MB)</span></label>
    <input type="file" id="logo" name="logo" accept=".jpg,.jpeg,.png,.webp,.gif">

    {{-- ── Content ── --}}
    <label for="excerpt">Excerpt <span class="muted">(short summary shown on the card — one or two sentences)</span></label>
    <textarea id="excerpt" name="excerpt" rows="3"
              placeholder="e.g. State-linked heavy equipment manufacturer headquartered in Liuzhou, Guangxi, China.">{{ old('excerpt') }}</textarea>

    <label for="content">Full Content / Overview <span class="muted">(optional rich text — use for company overviews, governance structure, ownership info, etc.)</span></label>
    <div id="content-editor" style="background:#fff;"></div>
    <textarea id="content" name="content" hidden>{{ old('content') }}</textarea>

    <label for="note">Highlighted Note <span class="muted">(optional — shown as a callout, e.g. "State-owned enterprise with mixed public listing")</span></label>
    <textarea id="note" name="note" rows="2"
              placeholder="e.g. Ultimate Controller: Guangxi SASAC (24.62%)">{{ old('note') }}</textarea>

    <label for="topics">Topics / Tags <span class="muted">(optional — comma-separated, e.g. "Equipment, China, Heavy Machinery")</span></label>
    <input type="text" id="topics" name="topics" value="{{ old('topics') }}"
           placeholder="e.g. Equipment, OEM, Heavy Machinery">

    {{-- ── Display settings ── --}}
    <label for="sort_order">Display Order <span class="muted">(lower numbers appear first within a category)</span></label>
    <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', 0) }}" min="0">

    <label for="status">Status</label>
    <select id="status" name="status" required>
        <option value="published" @selected(old('status', 'published') === 'published')>Published — visible on the public page immediately</option>
        <option value="draft"     @selected(old('status') === 'draft')>Draft — saved but hidden from the public page</option>
    </select>

    <button type="submit" class="btn btn-primary btn-lg" style="margin-top:6px;">
        <x-icon name="check-circle" class="icon-sm" /> Create Entry
    </button>
</form>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
<script src="{{ asset('js/rich-editor-init.js') }}"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        YQL_initRichEditor('content-editor', 'content');
    });
</script>
@endsection
