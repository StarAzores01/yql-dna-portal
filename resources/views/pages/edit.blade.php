@extends('layouts.app')

@php
    $pages = [
        'home' => 'Home',
        'about' => 'About',
        'services' => 'Services',
        'lease' => 'Lease',
        'external-links' => 'External Links',
        'project-gallery' => 'Project Gallery',
    ];
@endphp

@section('content')
<h1>Page Content</h1>

<div class="instruction-panel">
    <button class="instruction-panel-toggle" aria-expanded="false" aria-controls="help-pages">
        <span>ℹ️ How to use this page</span>
        <span class="instruction-chevron">▼</span>
    </button>
    <div class="instruction-panel-body" id="help-pages">
        <p><strong>Edit the hero heading, subtitle, and description text</strong> for each public page. The rest of each page's layout and design is unchanged — only the text/image fields below are editable.</p>
        <ul>
            <li>Leaving a field empty and saving will clear it — use the page's current wording as a starting point.</li>
            <li>Heading fields may contain a <code>&lt;span&gt;</code> tag to match the site's two-tone title style.</li>
        </ul>
    </div>
</div>

<div class="action-btn-group" style="margin-bottom:16px;">
    @foreach($pages as $slug => $label)
        <a href="{{ route('admin.pages.edit', $slug) }}" class="btn {{ $slug === $page ? 'btn-primary' : 'btn-secondary' }} btn-sm">{{ $label }}</a>
    @endforeach
</div>

<form method="POST" action="{{ route('admin.pages.update', $page) }}" enctype="multipart/form-data" class="form-card">
    @csrf
    @method('PUT')

    @foreach($fields as $field)
        @php
            $key = $field['key'];
            $current = old($key, $existing[$key] ?? $field['default']);
        @endphp

        @if($field['type'] === 'image')
            <label for="{{ $key }}">{{ $field['label'] }}</label>
            <p>
                <img src="{{ isset($existing[$key]) ? asset('storage/' . $existing[$key]) : asset($field['default']) }}"
                     alt="{{ $field['label'] }}" style="max-width:240px;border-radius:6px;">
            </p>
            <input type="file" id="{{ $key }}" name="{{ $key }}" accept=".jpg,.jpeg,.png,.webp,.gif">
        @elseif($field['type'] === 'textarea')
            <label for="{{ $key }}">{{ $field['label'] }}</label>
            <textarea id="{{ $key }}" name="{{ $key }}" rows="4">{{ $current }}</textarea>
        @else
            <label for="{{ $key }}">{{ $field['label'] }}</label>
            <input type="text" id="{{ $key }}" name="{{ $key }}" value="{{ $current }}">
        @endif
    @endforeach

    <button type="submit" class="btn btn-primary btn-lg" style="margin-top:6px;">💾 Save Page Content</button>
</form>
@endsection
