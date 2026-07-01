@extends('layouts.app')

@section('content')
<h1>Blog Posts</h1>

<div class="instruction-panel">
    <button class="instruction-panel-toggle" aria-expanded="false" aria-controls="help-blog">
        <span>ℹ️ How to use this page</span>
        <span class="instruction-chevron">▼</span>
    </button>
    <div class="instruction-panel-body" id="help-blog">
        <p><strong>Manage the public Blog page</strong> shown at <code>/blog</code>.</p>
        <ul>
            <li><strong>Draft</strong> posts are saved but not shown publicly. <strong>Published</strong> posts appear immediately, newest first.</li>
            <li>Deleting a post removes it and its image permanently.</li>
        </ul>
    </div>
</div>

<a href="{{ route('admin.blog-posts.create') }}" class="btn btn-primary" style="margin-bottom:14px;">+ New Blog Post</a>

<table class="data-table">
    <thead>
        <tr>
            <th>Title</th>
            <th>Status</th>
            <th>Published</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    @forelse($blogPosts as $post)
        <tr>
            <td>{{ $post->title }}</td>
            <td>{{ ucfirst($post->status) }}</td>
            <td>{{ $post->published_at?->format('d M Y') ?? '—' }}</td>
            <td>
                <div class="action-btn-group">
                    <a href="{{ route('admin.blog-posts.edit', $post) }}" class="btn-action btn-edit-user">✏️ Edit</a>
                    <form method="POST" action="{{ route('admin.blog-posts.destroy', $post) }}" style="display:inline"
                          data-confirm="This will permanently remove this blog post and its image."
                          data-confirm-title="Delete &quot;{{ $post->title }}&quot;?">
                        @csrf @method('DELETE')
                        <button type="submit" class="btn-action btn-delete">🗑 Delete</button>
                    </form>
                </div>
            </td>
        </tr>
    @empty
        <tr><td colspan="4">No blog posts yet.</td></tr>
    @endforelse
    </tbody>
</table>

{{ $blogPosts->links() }}
@endsection
