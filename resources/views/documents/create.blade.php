@extends('layouts.app')

@section('content')
<h1>Upload Document</h1>

<div class="instruction-panel">
    <button class="instruction-panel-toggle" aria-expanded="false" aria-controls="help-upload">
        <span>ℹ️ How to use this page</span>
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
            <li><strong>File:</strong> Accepted formats: PDF, Word, Excel, PowerPoint, JPEG, PNG. Maximum size: <strong>10 MB</strong>.</li>
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

    <label for="file">File <span style="font-weight:400;color:#888">(PDF, Word, Excel, PowerPoint, JPEG, PNG — max 10 MB)</span></label>
    <input type="file" id="file" name="file" required accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.jpg,.jpeg,.png">

    <button type="submit" class="btn btn-primary btn-lg" style="margin-top:6px;">⬆ Upload Document</button>
</form>
@endsection
