<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Yellowquip Zambia Limited')</title>
    <meta name="description" content="@yield('meta_description', 'Provides heavy equipment like excavators, bulldozers, motor graders, and wheel loaders and Hydraulic Rock Breaker.')">
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
    <header class="topbar public-topbar">
        <div class="topbar-inner">
            <a href="{{ route('landing') }}" class="brand">
                <img src="{{ asset('images/yql-logo.png') }}" alt="Yellowquip Zambia Limited">
                Yellow<span>quip</span>
            </a>

            <button type="button" class="nav-toggle" aria-label="Toggle navigation" onclick="document.querySelector('.public-nav').classList.toggle('open')">&#9776;</button>

            <nav class="nav-links public-nav">
                <a href="{{ route('landing') }}" class="{{ request()->routeIs('landing') ? 'active' : '' }}">Home</a>
                <a href="{{ route('public.management-team') }}" class="{{ request()->routeIs('public.management-team') ? 'active' : '' }}">Management Team</a>
                <a href="{{ route('public.about') }}" class="{{ request()->routeIs('public.about') ? 'active' : '' }}">About</a>
                <a href="{{ route('public.lease') }}" class="{{ request()->routeIs('public.lease') ? 'active' : '' }}">Lease</a>
                <a href="{{ route('public.services') }}" class="{{ request()->routeIs('public.services') ? 'active' : '' }}">Services</a>
                <a href="{{ route('public.project-gallery') }}" class="{{ request()->routeIs('public.project-gallery') ? 'active' : '' }}">Project Gallery</a>
                <a href="{{ route('public.articles') }}" class="{{ request()->routeIs('public.articles') ? 'active' : '' }}">Articles</a>
                <a href="{{ route('public.blog') }}" class="{{ request()->routeIs('public.blog') ? 'active' : '' }}">Blog</a>

                <div class="nav-more">
                    <button type="button" class="nav-more-toggle" onclick="this.parentElement.classList.toggle('open')">more &nbsp;&rsaquo;</button>
                    <div class="nav-more-menu">
                        <a href="{{ route('public.contact') }}">Contact Us</a>
                        <a href="{{ route('public.external-links') }}">External Links</a>
                        <a href="{{ route('public.services') }}">Services</a>
                    </div>
                </div>
            </nav>

            <div class="topbar-actions">
                <button type="button" class="theme-toggle" onclick="window.YQL_toggleTheme()" aria-label="Toggle dark mode">
                    <span class="theme-icon-light">&#9728;</span>
                    <span class="theme-icon-dark">&#9789;</span>
                </button>
                @auth
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary btn-sm">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="btn btn-secondary btn-sm">Member Login</a>
                @endauth
            </div>
        </div>
    </header>

    <main>
        @yield('content')
    </main>

    <footer class="footer public-footer">
        <div class="footer-inner">
            <div>
                <strong>Yellowquip Zambia Limited</strong> &mdash; est. 2008<br>
                6058 Kasompe Road, Chingola South, Copperbelt, Zambia
            </div>
            <div class="footer-links">
                <a href="{{ route('public.contact') }}">Contact Us</a>
                <a href="{{ route('public.external-links') }}">External Links</a>
                <a href="{{ route('public.services') }}">Services</a>
                <a href="{{ route('login') }}">Member Login</a>
            </div>
        </div>
        <small>&copy; {{ date('Y') }} Yellowquip Zambia Limited. All rights reserved.</small>
    </footer>

    <script src="{{ asset('js/theme-toggle.js') }}"></script>
</body>
</html>
