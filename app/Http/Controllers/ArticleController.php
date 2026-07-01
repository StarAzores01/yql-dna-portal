<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Services\AuditLogService;
use App\Support\HandlesPublicImageUpload;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ArticleController extends Controller
{
    use HandlesPublicImageUpload;

    public function index()
    {
        $articles = Article::latest('created_at')->paginate(20);

        return view('content-articles.index', compact('articles'));
    }

    public function create()
    {
        return view('content-articles.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validated($request);
        $validated['slug'] = Article::uniqueSlugFrom($validated['title']);
        $validated['created_by'] = $request->user()->id;

        if ($validated['status'] === 'published' && empty($validated['published_at'])) {
            $validated['published_at'] = now();
        }

        if ($request->hasFile('image')) {
            $validated['image_path'] = $this->storePublicImage($request->file('image'), 'articles');
        }

        $article = Article::create($validated);

        AuditLogService::log($request->user()->id, 'article_create', 'Created article #' . $article->id . ' (' . $article->title . ')', $request);

        return redirect()->route('admin.content-articles.index')->with('success', 'Article created.');
    }

    public function edit(Article $article)
    {
        return view('content-articles.edit', ['article' => $article]);
    }

    public function update(Request $request, Article $article)
    {
        $validated = $this->validated($request);

        if ($validated['title'] !== $article->title) {
            $validated['slug'] = Article::uniqueSlugFrom($validated['title'], $article->id);
        }

        if ($validated['status'] === 'published' && empty($validated['published_at']) && ! $article->published_at) {
            $validated['published_at'] = now();
        }

        if ($request->hasFile('image')) {
            $this->deletePublicImage($article->image_path);
            $validated['image_path'] = $this->storePublicImage($request->file('image'), 'articles');
        }

        $article->update($validated);

        AuditLogService::log($request->user()->id, 'article_update', 'Updated article #' . $article->id . ' (' . $article->title . ')', $request);

        return redirect()->route('admin.content-articles.index')->with('success', 'Article updated.');
    }

    public function destroy(Request $request, Article $article)
    {
        $this->deletePublicImage($article->image_path);

        AuditLogService::log($request->user()->id, 'article_delete', 'Deleted article #' . $article->id . ' (' . $article->title . ')', $request);
        $article->delete();

        return redirect()->route('admin.content-articles.index')->with('success', 'Article deleted.');
    }

    private function validated(Request $request): array
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['nullable', 'string', 'max:100'],
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
