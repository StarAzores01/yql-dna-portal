<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\BlogPost;
use App\Models\ExternalLink;
use App\Models\GalleryItem;
use App\Models\PageContent;
use App\Models\TeamMember;

class PublicPageController extends Controller
{
    public function home()
    {
        return view('public.home', ['content' => PageContent::forPage('home')]);
    }

    public function about()
    {
        return view('public.about', ['content' => PageContent::forPage('about')]);
    }

    public function managementTeam()
    {
        $team = TeamMember::active()->orderBy('sort_order')->orderBy('name')->get();

        return view('public.management-team', compact('team'));
    }

    public function lease()
    {
        return view('public.lease', ['content' => PageContent::forPage('lease')]);
    }

    public function services()
    {
        return view('public.services', ['content' => PageContent::forPage('services')]);
    }

    public function projectGallery()
    {
        $items = GalleryItem::active()->orderBy('sort_order')->orderBy('title')->get();

        return view('public.project-gallery', [
            'content' => PageContent::forPage('project-gallery'),
            'items' => $items,
        ]);
    }

    public function articles()
    {
        $articles = Article::published()->latest('published_at')->get();
        $topics = $articles->flatMap->topicsList()->unique()->sort()->values();

        return view('public.articles', compact('articles', 'topics'));
    }

    public function blog()
    {
        $posts = BlogPost::published()->latest('published_at')->get();
        $topics = $posts->flatMap->topicsList()->unique()->sort()->values();

        return view('public.blog', compact('posts', 'topics'));
    }

    public function contact()
    {
        return view('public.contact');
    }

    public function externalLinks()
    {
        $links = ExternalLink::active()
            ->orderBy('category')
            ->orderBy('sort_order')
            ->orderBy('title')
            ->get()
            ->groupBy('category');

        return view('public.external-links', [
            'content' => PageContent::forPage('external-links'),
            'links'   => $links,
        ]);
    }
}
