@extends('layouts.app')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
@endsection

@section('content')
<h1>Edit External Link Entry</h1>

<form method="POST" action="{{ route('admin.external-links.update', $link) }}" enctype="multipart/form-data" class="form-card">
    @csrf
    @method('PUT')

    <h2>Company / Link Basic Information</h2>

    <label for="title">Company Name <span class="muted">(full legal name)</span></label>
    <input type="text" id="title" name="title" value="{{ old('title', $link->title) }}" required>

    <label for="display_title">Display Title <span class="muted">(optional — shorter name shown on the card; defaults to Company Name)</span></label>
    <input type="text" id="display_title" name="display_title" value="{{ old('display_title', $link->display_title) }}">

    <label for="category">Category <span class="muted">(groups this entry with others on the public page — use consistent spelling)</span></label>
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

    <label for="url">External URL <span class="muted">(optional — the "Visit" button target; leave blank until a confirmed link is available)</span></label>
    <input type="url" id="url" name="url" value="{{ old('url', $link->url) }}">

    <label for="link_label">Link Button Label <span class="muted">(optional — defaults to "Visit Site" if left empty)</span></label>
    <input type="text" id="link_label" name="link_label" value="{{ old('link_label', $link->link_label) }}"
           placeholder="e.g. Visit LiuGong &rsaquo;">

    <label for="icon">Card Icon</label>
    <select id="icon" name="icon" required>
        @foreach($icons as $value => $label)
            <option value="{{ $value }}" @selected(old('icon', $link->icon) === $value)>{{ $label }}</option>
        @endforeach
    </select>

    @if($link->logo_path)
        <p>
            <img src="{{ asset('storage/' . $link->logo_path) }}" alt="{{ $link->title }}"
                 style="max-width:160px;max-height:80px;object-fit:contain;border-radius:4px;border:1px solid #e0e0e0;padding:4px;">
        </p>
    @endif
    <label for="logo">{{ $link->logo_path ? 'Replace Logo' : 'Logo / Brand Image' }} <span class="muted">(optional — JPG, PNG, WebP, or GIF, max 5 MB{{ $link->logo_path ? '; leave empty to keep current' : '' }})</span></label>
    <input type="file" id="logo" name="logo" accept=".jpg,.jpeg,.png,.webp,.gif">

    <label for="excerpt">Short Description <span class="muted">(shown on the card)</span></label>
    <textarea id="excerpt" name="excerpt" rows="3">{{ old('excerpt', $link->excerpt) }}</textarea>

    <label for="full_description">Full Description <span class="muted">(optional — longer intro paragraph shown above the company profile sections)</span></label>
    <textarea id="full_description" name="full_description" rows="4">{{ old('full_description', $link->full_description) }}</textarea>

    <label for="topics">Topics / Tags <span class="muted">(optional — comma-separated)</span></label>
    <input type="text" id="topics" name="topics" value="{{ old('topics', $link->topics) }}"
           placeholder="e.g. Equipment, OEM, Heavy Machinery">

    <label for="note">Highlighted Note <span class="muted">(optional — shown as a callout on the card)</span></label>
    <textarea id="note" name="note" rows="2">{{ old('note', $link->note) }}</textarea>

    <h2>Company Overview</h2>

    <label for="headquarters">Headquarters</label>
    <input type="text" id="headquarters" name="headquarters" value="{{ old('headquarters', $link->headquarters) }}">

    <label for="employee_count">Employees</label>
    <input type="text" id="employee_count" name="employee_count" value="{{ old('employee_count', $link->employee_count) }}">

    <label for="main_products">Main Products</label>
    <textarea id="main_products" name="main_products" rows="3">{{ old('main_products', $link->main_products) }}</textarea>

    <label for="industry">Industry</label>
    <input type="text" id="industry" name="industry" value="{{ old('industry', $link->industry) }}">

    <label for="country">Country</label>
    <input type="text" id="country" name="country" value="{{ old('country', $link->country) }}">

    <label for="website_url">Company Website <span class="muted">(optional — informational only; used as a fallback for the Visit button if External URL is empty)</span></label>
    <input type="url" id="website_url" name="website_url" value="{{ old('website_url', $link->website_url) }}">

    <h2>Ownership and Control</h2>

    <label for="controlling_shareholder">Controlling Shareholder</label>
    <input type="text" id="controlling_shareholder" name="controlling_shareholder" value="{{ old('controlling_shareholder', $link->controlling_shareholder) }}">

    <label for="controlling_shareholder_percentage">Controlling Shareholder %</label>
    <input type="text" id="controlling_shareholder_percentage" name="controlling_shareholder_percentage" value="{{ old('controlling_shareholder_percentage', $link->controlling_shareholder_percentage) }}" placeholder="e.g. 25.94%">

    <label for="ultimate_controller">Ultimate Controller</label>
    <input type="text" id="ultimate_controller" name="ultimate_controller" value="{{ old('ultimate_controller', $link->ultimate_controller) }}">

    <label for="ultimate_controller_percentage">Ultimate Controller %</label>
    <input type="text" id="ultimate_controller_percentage" name="ultimate_controller_percentage" value="{{ old('ultimate_controller_percentage', $link->ultimate_controller_percentage) }}" placeholder="e.g. 24.62%">

    <label for="company_nature">Company Nature</label>
    <input type="text" id="company_nature" name="company_nature" value="{{ old('company_nature', $link->company_nature) }}">

    <h2>Governance Structure</h2>

    <label for="chairman">Chairman</label>
    <input type="text" id="chairman" name="chairman" value="{{ old('chairman', $link->chairman) }}">

    <label for="ceo">CEO</label>
    <input type="text" id="ceo" name="ceo" value="{{ old('ceo', $link->ceo) }}">

    <label for="key_directors">Key Directors <span class="muted">(comma-separated)</span></label>
    <textarea id="key_directors" name="key_directors" rows="2">{{ old('key_directors', $link->key_directors) }}</textarea>

    <label for="governance_notes">Governance Notes</label>
    <textarea id="governance_notes" name="governance_notes" rows="3">{{ old('governance_notes', $link->governance_notes) }}</textarea>

    <h2>Rich Content</h2>

    <label for="content">Additional Content <span class="muted">(optional rich text — use for anything not covered by the structured fields above)</span></label>
    <div id="content-editor" style="background:#fff;"></div>
    <textarea id="content" name="content" hidden>{{ old('content', $link->content) }}</textarea>

    <h2>SEO / Metadata</h2>

    <label for="meta_title">Meta Title <span class="muted">(optional)</span></label>
    <input type="text" id="meta_title" name="meta_title" value="{{ old('meta_title', $link->meta_title) }}">

    <label for="meta_description">Meta Description <span class="muted">(optional)</span></label>
    <textarea id="meta_description" name="meta_description" rows="2">{{ old('meta_description', $link->meta_description) }}</textarea>

    <h2>Display Settings</h2>

    <label for="sort_order">Display Order <span class="muted">(lower numbers appear first within a category)</span></label>
    <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', $link->sort_order) }}" min="0">

    <label for="status">Status</label>
    <select id="status" name="status" required>
        <option value="published" @selected(old('status', $link->status) === 'published')>Published — visible on the public page</option>
        <option value="draft"     @selected(old('status', $link->status) === 'draft')>Draft — hidden from the public page</option>
    </select>

    <button type="submit" class="btn btn-primary btn-lg" style="margin-top:6px;">
        <x-icon name="save" class="icon-sm" /> Save Changes
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
