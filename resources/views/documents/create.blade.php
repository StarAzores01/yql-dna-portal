@extends('layouts.app')

@section('content')
<h1>Upload Document</h1>

<div class="instruction-panel">
    <button class="instruction-panel-toggle" aria-expanded="false" aria-controls="help-upload">
        <span><x-icon name="info" class="icon-sm" /> How to use this page</span>
        <span class="instruction-chevron">▼</span>
    </button>
    <div class="instruction-panel-body" id="help-upload">
        <p><strong>Upload a new document</strong> to make it available to authorized staff in the portal.</p>
        <ul>
            <li><strong>Title:</strong> Give the document a clear, descriptive name (e.g. "Safety Manual 2024").</li>
            <li><strong>Description:</strong> Optional — add extra details to help others find the document when searching.</li>
            <li><strong>Category:</strong> Choose the category that best describes the document's topic.</li>
            <li><strong>Access Level:</strong> Controls who can see this document. <em>All</em> = every logged-in user &nbsp;·&nbsp; <em>Staff</em> = staff and above &nbsp;·&nbsp; <em>Admin</em> = administrators only.</li>
            <li><strong>Status:</strong> <em>Active</em> makes the document immediately visible; <em>Archived</em> hides it until restored.</li>
            <li><strong>File:</strong> Accepted formats: PDF, Word, Excel, PowerPoint, OpenDocument, images (JPG, PNG, GIF, WebP, SVG), archives (ZIP, RAR, 7Z), video (MP4, MOV, MKV, AVI), audio (MP3, WAV, AAC), and text/data files (TXT, CSV, RTF, XML, JSON). Maximum size: <strong>100 MB</strong>.</li>
        </ul>
    </div>
</div>

<form method="POST" action="{{ route('documents.store') }}" enctype="multipart/form-data" class="form-card">
    @csrf

    <label for="title">Title</label>
    <input type="text" id="title" name="title" value="{{ old('title') }}" required placeholder="e.g. Safety Manual 2024">

    <label for="description">Description <span style="font-weight:400;color:#888">(optional)</span></label>
    <textarea id="description" name="description" rows="3" placeholder="Brief summary of the document's content">{{ old('description') }}</textarea>

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
            <option value="{{ $level }}" @selected(old('access_level') === $level)>{{ ucfirst($level) }}</option>
        @endforeach
    </select>

    <label for="status">Status</label>
    <select id="status" name="status" required>
        <option value="active"    @selected(old('status', 'active') === 'active')>Active — visible immediately</option>
        <option value="archived"  @selected(old('status') === 'archived')>Archived — hidden until restored</option>
    </select>

    <label for="file">File <span style="font-weight:400;color:#888">(Documents, Images, Archives, Video, Audio — max 100 MB)</span></label>
    <input type="file" id="file" name="file" required accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.odt,.ods,.odp,.txt,.rtf,.csv,.xml,.json,.jpg,.jpeg,.png,.gif,.bmp,.webp,.svg,.tiff,.tif,.zip,.rar,.7z,.mp4,.mov,.avi,.wmv,.mkv,.webm,.mp3,.wav,.aac,.ogg,.m4a">

    <button type="submit" class="btn btn-primary btn-lg" style="margin-top:6px;"><x-icon name="upload-cloud" class="icon-sm" /> Upload Document</button>
</form>
@endsection
