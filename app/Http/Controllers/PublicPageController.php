<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\BlogPost;
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
        return view('public.project-gallery', ['content' => PageContent::forPage('project-gallery')]);
    }

    public function articles()
    {
        $articles = Article::published()->latest('published_at')->get();

        return view('public.articles', compact('articles'));
    }

    public function blog()
    {
        $posts = BlogPost::published()->latest('published_at')->get();

        return view('public.blog', compact('posts'));
    }

    public function contact()
    {
        return view('public.contact');
    }

    public function externalLinks()
    {
        return view('public.external-links', ['content' => PageContent::forPage('external-links')]);
    }
}
