@extends('layouts.app')

@section('content')
<h1>Welcome, {{ auth()->user()->name }}</h1>
<p class="muted">Role: <strong>{{ ucfirst(auth()->user()->role) }}</strong></p>

<div class="quick-cards">
    @foreach($categories as $category)
        <a href="{{ route('documents.index', ['category_id' => $category->id]) }}" class="quick-card">
            <h3>{{ $category->name }}</h3>
            <span>{{ $category->documents_count }} document(s)</span>
        </a>
    @endforeach
</div>

<h2>Recently Uploaded Documents</h2>
@if($recentDocuments->isEmpty())
    <p class="muted">No documents available to your role yet.</p>
@else
    <table class="data-table">
        <thead>
            <tr><th>Title</th><th>Category</th><th>Uploaded</th><th></th></tr>
        </thead>
        <tbody>
        @foreach($recentDocuments as $doc)
            <tr>
                <td>{{ $doc->title }}</td>
                <td>{{ $doc->category->name }}</td>
                <td>{{ $doc->created_at->diffForHumans() }}</td>
                <td><a href="{{ route('documents.download', $doc) }}">Download</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif

<div class="security-reminder">
    🔒 Reminder: This portal contains confidential company information. Do not share your login credentials or downloaded documents outside authorized personnel.
</div>
@endsection
