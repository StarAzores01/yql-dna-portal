<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Services\AuditLogService;
use App\Support\HandlesPublicImageUpload;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BlogPostController extends Controller
{
    use HandlesPublicImageUpload;

    public function index()
    {
        $blogPosts = BlogPost::latest('created_at')->paginate(20);

        return view('blog-posts.index', compact('blogPosts'));
    }

    public function create()
    {
        return view('blog-posts.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validated($request);
        $validated['slug'] = BlogPost::uniqueSlugFrom($validated['title']);
        $validated['created_by'] = $request->user()->id;

        if ($validated['status'] === 'published' && empty($validated['published_at'])) {
            $validated['published_at'] = now();
        }

        if ($request->hasFile('image')) {
            $validated['image_path'] = $this->storePublicImage($request->file('image'), 'blog');
        }

        $post = BlogPost::create($validated);

        AuditLogService::log($request->user()->id, 'blog_post_create', 'Created blog post #' . $post->id . ' (' . $post->title . ')', $request);

        return redirect()->route('admin.blog-posts.index')->with('success', 'Blog post created.');
    }

    public function edit(BlogPost $post)
    {
        return view('blog-posts.edit', ['post' => $post]);
    }

    public function update(Request $request, BlogPost $post)
    {
        $validated = $this->validated($request);

        if ($validated['title'] !== $post->title) {
            $validated['slug'] = BlogPost::uniqueSlugFrom($validated['title'], $post->id);
        }

        if ($validated['status'] === 'published' && empty($validated['published_at']) && ! $post->published_at) {
            $validated['published_at'] = now();
        }

        if ($request->hasFile('image')) {
            $this->deletePublicImage($post->image_path);
            $validated['image_path'] = $this->storePublicImage($request->file('image'), 'blog');
        }

        $post->update($validated);

        AuditLogService::log($request->user()->id, 'blog_post_update', 'Updated blog post #' . $post->id . ' (' . $post->title . ')', $request);

        return redirect()->route('admin.blog-posts.index')->with('success', 'Blog post updated.');
    }

    public function destroy(Request $request, BlogPost $post)
    {
        $this->deletePublicImage($post->image_path);

        AuditLogService::log($request->user()->id, 'blog_post_delete', 'Deleted blog post #' . $post->id . ' (' . $post->title . ')', $request);
        $post->delete();

        return redirect()->route('admin.blog-posts.index')->with('success', 'Blog post deleted.');
    }

    private function validated(Request $request): array
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'excerpt' => ['nullable', 'string', 'max:2000'],
            'content' => ['nullable', 'string'],
            'note' => ['nullable', 'string', 'max:2000'],
            'cta_text' => ['nullable', 'string', 'max:255'],
            'cta_label' => ['nullable', 'string', 'max:100'],
            'cta_url' => ['nullable', 'string', 'max:255'],
            'status' => ['required', Rule::in(['draft', 'published'])],
            'published_at' => ['nullable', 'date'],
            'image' => $this->imageUploadRules,
        ]);

        unset($validated['image']);

        return $validated;
    }
}
