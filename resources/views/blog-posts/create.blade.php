@extends('layouts.app')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
@endsection

@section('content')
<h1>New Blog Post</h1>

<form method="POST" action="{{ route('admin.blog-posts.store') }}" enctype="multipart/form-data" class="form-card">
    @csrf

    <label for="title">Title</label>
    <input type="text" id="title" name="title" value="{{ old('title') }}" required placeholder="e.g. Safety First, Excellence Always">

    <label for="excerpt">Excerpt <span class="muted">(short summary shown in the post list)</span></label>
    <textarea id="excerpt" name="excerpt" rows="3">{{ old('excerpt') }}</textarea>

    <label for="content">Content</label>
    <div id="content-editor" style="background:#fff;"></div>
    <textarea id="content" name="content" hidden>{{ old('content') }}</textarea>

    <label for="note">Public Note <span class="muted">(optional — shown as a highlighted note under the excerpt)</span></label>
    <textarea id="note" name="note" rows="2">{{ old('note') }}</textarea>

    <label for="cta_text">Call-to-Action Lead-in Text <span class="muted">(optional — sentence shown above the button)</span></label>
    <input type="text" id="cta_text" name="cta_text" value="{{ old('cta_text') }}">

    <label for="cta_label">Call-to-Action Button Label <span class="muted">(optional)</span></label>
    <input type="text" id="cta_label" name="cta_label" value="{{ old('cta_label', 'Contact Us') }}">

    <label for="cta_url">Call-to-Action Link <span class="muted">(optional — defaults to the Contact page)</span></label>
    <input type="text" id="cta_url" name="cta_url" value="{{ old('cta_url') }}" placeholder="{{ route('public.contact') }}">

    <label for="status">Status</label>
    <select id="status" name="status" required>
        <option value="published" @selected(old('status', 'published') === 'published')>Published — visible immediately</option>
        <option value="draft"     @selected(old('status') === 'draft')>Draft — hidden from the public page</option>
    </select>

    <label for="image">Image <span class="muted">(JPG, PNG, WebP, or GIF — max 5 MB)</span></label>
    <input type="file" id="image" name="image" accept=".jpg,.jpeg,.png,.webp,.gif">

    <button type="submit" class="btn btn-primary btn-lg" style="margin-top:6px;">✅ Create Post</button>
</form>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
<script src="{{ asset('js/rich-editor-init.js') }}"></script>
<script>document.addEventListener('DOMContentLoaded', function () { YQL_initRichEditor('content-editor', 'content'); });</script>
@endsection
