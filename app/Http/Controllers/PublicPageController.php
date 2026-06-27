<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PublicPageController extends Controller
{
    public function home()
    {
        return view('public.home');
    }

    public function about()
    {
        return view('public.about');
    }

    public function managementTeam()
    {
        return view('public.management-team');
    }

    public function lease()
    {
        return view('public.lease');
    }

    public function services()
    {
        return view('public.services');
    }

    public function projectGallery()
    {
        return view('public.project-gallery');
    }

    public function articles()
    {
        return view('public.articles');
    }

    public function blog()
    {
        return view('public.blog');
    }

    public function contact()
    {
        return view('public.contact');
    }

    public function externalLinks()
    {
        return view('public.external-links');
    }
}
