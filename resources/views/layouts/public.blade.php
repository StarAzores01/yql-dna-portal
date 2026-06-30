<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @php
        $seoTitle       = $title       ?? $__env->yieldContent('title');
        $seoTitle       = (is_string($seoTitle) && trim($seoTitle) !== '') ? trim($seoTitle) : 'YellowQuip Zambia Limited';

        $seoDescription = $description ?? $__env->yieldContent('meta_description');
        $seoDescription = (is_string($seoDescription) && trim($seoDescription) !== '') ? trim($seoDescription) : 'YellowQuip Zambia Limited provides equipment leasing, maintenance, operator training, artisan development, consulting, and technical services for mining and industrial operations.';

        $seoCanonical   = $canonical   ?? url()->current();
        $seoImage       = $ogImage     ?? asset('assets/images/brand/yql-og-image.png');
    @endphp

    {{-- Primary SEO --}}
    <title>{{ $seoTitle }}</title>
    <meta name="description" content="{{ $seoDescription }}">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ $seoCanonical }}">

    {{-- Favicon --}}
    <link rel="icon" href="{{ asset('assets/images/brand/yql-favicon.png') }}" type="image/png">

    {{-- Open Graph (Facebook / LinkedIn) --}}
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="YellowQuip Zambia Limited">
    <meta property="og:title" content="{{ $seoTitle }}">
    <meta property="og:description" content="{{ $seoDescription }}">
    <meta property="og:url" content="{{ $seoCanonical }}">
    <meta property="og:image" content="{{ $seoImage }}">

    {{-- Twitter Card --}}
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $seoTitle }}">
    <meta name="twitter:description" content="{{ $seoDescription }}">
    <meta name="twitter:image" content="{{ $seoImage }}">

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script>
        (function () {
            try {
                var t = localStorage.getItem('yql-theme');
                if (t) { document.documentElement.setAttribute('data-theme', t); }
            } catch (e) {}
        })();
    </script>
</head>
<body>
    <header class="public-header" id="public-header">
        <div class="public-header-inner">

            {{-- Left: Brand / Logo --}}
            <a href="{{ route('landing') }}" class="brand" aria-label="YellowQuip Zambia Limited — Home">
                <img src="{{ asset('assets/images/brand/yql-logo.png') }}"
                     alt="YellowQuip Zambia Limited logo"
                     width="44" height="44"
                     onerror="this.style.display='none'">
                Yellow<span>Quip</span>
            </a>

            {{-- Centre: Navigation (desktop) --}}
            <nav class="public-nav" id="public-nav" aria-label="Main navigation">
                <a href="{{ route('landing') }}"                  class="{{ request()->routeIs('landing')                  ? 'active' : '' }}">Home</a>
                <a href="{{ route('public.management-team') }}"   class="{{ request()->routeIs('public.management-team')   ? 'active' : '' }}">Management Team</a>
                <a href="{{ route('public.about') }}"             class="{{ request()->routeIs('public.about')             ? 'active' : '' }}">About</a>
                <a href="{{ route('public.lease') }}"             class="{{ request()->routeIs('public.lease')             ? 'active' : '' }}">Lease</a>
                <a href="{{ route('public.services') }}"          class="{{ request()->routeIs('public.services')          ? 'active' : '' }}">Services</a>
                <a href="{{ route('public.project-gallery') }}"   class="{{ request()->routeIs('public.project-gallery')   ? 'active' : '' }}">Project Gallery</a>
                <a href="{{ route('public.articles') }}"          class="{{ request()->routeIs('public.articles')          ? 'active' : '' }}">Articles</a>
                <a href="{{ route('public.blog') }}"              class="{{ request()->routeIs('public.blog')              ? 'active' : '' }}">Blog</a>
                <a href="{{ route('public.contact') }}"           class="{{ request()->routeIs('public.contact')           ? 'active' : '' }}">Contact Us</a>
                <a href="{{ route('public.external-links') }}"    class="{{ request()->routeIs('public.external-links')    ? 'active' : '' }}">External Links</a>
            </nav>

            {{-- Right: Theme toggle + Login/Dashboard --}}
            <div class="public-header-actions">
                <button type="button" class="theme-toggle" onclick="window.YQL_toggleTheme()" aria-label="Toggle dark mode">
                    <span class="theme-icon-light"><x-icon name="sun" /></span>
                    <span class="theme-icon-dark"><x-icon name="moon" /></span>
                </button>
                @auth
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-sm">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-secondary btn-sm">Member Login</a>
                @endauth
            </div>

            {{-- Hamburger (mobile only) --}}
            <button type="button"
                    class="nav-hamburger"
                    id="nav-hamburger"
                    aria-label="Toggle navigation"
                    aria-expanded="false"
                    aria-controls="public-nav"
                    onclick="
                        var nav = document.getElementById('public-nav');
                        var btn = document.getElementById('nav-hamburger');
                        var open = nav.classList.toggle('is-open');
                        btn.setAttribute('aria-expanded', open);
                        btn.classList.toggle('is-open', open);
                    ">
                <span class="hamburger-icon-menu"><x-icon name="menu" /></span>
                <span class="hamburger-icon-close"><x-icon name="x" /></span>
            </button>

        </div>
    </header>

    <main class="public-main">
        @if (session('success') || $errors->any())
            <div class="public-main-flash">
                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-error">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
        @endif
        @yield('content')
    </main>

    <footer class="public-footer">
        <div class="public-footer-inner">

            {{-- Column 1: Brand --}}
            <div class="public-footer-brand">
                <a href="{{ route('landing') }}" class="footer-brand-link">
                    <img src="{{ asset('assets/images/brand/yql-logo.png') }}"
                         alt="YellowQuip Zambia Limited logo"
                         class="footer-logo"
                         width="36" height="36"
                         onerror="this.style.display='none'">
                    Yellow<span>Quip</span>
                </a>
                <p class="footer-tagline">YellowQuip Zambia Limited &mdash; est.&nbsp;2008</p>
            </div>

            {{-- Column 2: Address --}}
            <div class="public-footer-col">
                <h4 class="footer-col-heading">Our Location</h4>
                <address class="footer-address">
                    6058 Kasompe Road<br>
                    Chingola South<br>
                    Copperbelt, Zambia
                </address>
            </div>

            {{-- Column 3: Quick Links --}}
            <div class="public-footer-col">
                <h4 class="footer-col-heading">Quick Links</h4>
                <nav class="footer-nav" aria-label="Footer navigation">
                    <a href="{{ route('public.contact') }}">Contact Us</a>
                    <a href="{{ route('public.external-links') }}">External Links</a>
                    <a href="{{ route('public.services') }}">Services</a>
                    @auth
                        <a href="{{ route('dashboard') }}">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}">Member Login</a>
                    @endauth
                </nav>
            </div>

        </div>
        <div class="public-footer-bottom">
            <small>&copy; {{ date('Y') }} YellowQuip Zambia Limited. All rights reserved.</small>
        </div>
    </footer>

    <script src="{{ asset('js/theme-toggle.js') }}"></script>
    @yield('scripts')
</body>
</html>
