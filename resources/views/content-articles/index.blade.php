@extends('layouts.app')

@section('content')
<h1>Articles</h1>

<div class="instruction-panel">
    <button class="instruction-panel-toggle" aria-expanded="false" aria-controls="help-articles">
        <span>ℹ️ How to use this page</span>
        <span class="instruction-chevron">▼</span>
    </button>
    <div class="instruction-panel-body" id="help-articles">
        <p><strong>Manage the public Articles page</strong> shown at <code>/articles</code>.</p>
        <ul>
            <li><strong>Draft</strong> articles are saved but not shown publicly. <strong>Published</strong> articles appear immediately, newest first.</li>
            <li>Deleting an article removes it and its image permanently.</li>
        </ul>
    </div>
</div>

<a href="{{ route('admin.content-articles.create') }}" class="btn btn-primary" style="margin-bottom:14px;">+ New Article</a>

<table class="data-table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Category</th>
            <th>Status</th>
            <th>Published</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @forelse($articles as $article)
        <tr>
            <td>{{ $article->title }}</td>
            <td>{{ $article->category ?? '—' }}</td>
            <td>{{ ucfirst($article->status) }}</td>
            <td>{{ $article->published_at?->format('d M Y') ?? '—' }}</td>
            <td>
                <div class="action-btn-group">
                    <a href="{{ route('admin.content-articles.edit', $article) }}" class="btn-action btn-edit-user">✏️ Edit</a>
                    <form method="POST" action="{{ route('admin.content-articles.destroy', $article) }}" style="display:inline"
                          data-confirm="This will permanently remove this article and its image."
                          data-confirm-title="Delete &quot;{{ $article->title }}&quot;?">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn-action btn-delete">🗑 Delete</button>
                    </form>
                </div>
            </td>
        </tr>
    @empty
        <tr><td colspan="5">No articles yet.</td></tr>
    @endforelse
    </tbody>
</table>

{{ $articles->links() }}
@endsection
