<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title', 'YQL DNA Portal')</title>
    <link rel="icon" href="{{ asset('assets/images/brand/yql-favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @yield('styles')
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
    <header class="topbar">
        <div class="topbar-inner">
            <a href="{{ route('dashboard') }}" class="brand">
                <img src="{{ asset('assets/images/brand/yql-logo.png') }}" alt="YellowQuip Zambia Limited">
                YQL <span>DNA Portal</span>
            </a>
            @auth
            <nav class="nav-links">
                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
                <a href="{{ route('documents.index') }}" class="{{ request()->routeIs('documents.*') && !request()->routeIs('documents.create') ? 'active' : '' }}">Documents</a>
                <a href="{{ route('documents.create') }}" class="{{ request()->routeIs('documents.create') ? 'active' : '' }}">Upload</a>
                <a href="{{ route('password.change') }}" class="{{ request()->routeIs('password.change') ? 'active' : '' }}">Change Password</a>
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('users.index') }}" class="{{ request()->routeIs('users.*') ? 'active' : '' }}">Users</a>
                    <a href="{{ route('audit-logs.index') }}" class="{{ request()->routeIs('audit-logs.*') ? 'active' : '' }}">Audit Logs</a>
                    <a href="{{ route('admin.team.index') }}" class="{{ request()->routeIs('admin.team.*') ? 'active' : '' }}">Team</a>
                    <a href="{{ route('admin.blog-posts.index') }}" class="{{ request()->routeIs('admin.blog-posts.*') ? 'active' : '' }}">Blog</a>
                    <a href="{{ route('admin.content-articles.index') }}" class="{{ request()->routeIs('admin.content-articles.*') ? 'active' : '' }}">Articles</a>
                    <a href="{{ route('admin.pages.edit', 'home') }}" class="{{ request()->routeIs('admin.pages.*') ? 'active' : '' }}">Page Content</a>
                @endif
                <a href="{{ route('landing') }}">Public Site</a>
            </nav>
            <div class="topbar-actions">
                <button type="button" class="theme-toggle" onclick="window.YQL_toggleTheme()" aria-label="Toggle dark mode">
                    <span class="theme-icon-light"><x-icon name="sun" /></span>
                    <span class="theme-icon-dark"><x-icon name="moon" /></span>
                </button>
                <form method="POST" action="{{ route('logout') }}" class="logout-form">
                    @csrf
                    <span class="user-chip">{{ auth()->user()->name }} ({{ auth()->user()->role }})</span>
                    <button type="submit">Logout</button>
                </form>
            </div>
            @endauth
        </div>
    </header>

    {{-- Flash data passed to portal.js for toast display --}}
    @if(session('success'))
    <div id="flash-toast-data" data-message="{{ session('success') }}" data-type="success" hidden></div>
    @elseif(session('warning'))
    <div id="flash-toast-data" data-message="{{ session('warning') }}" data-type="warning" hidden></div>
    @elseif(session('error'))
    <div id="flash-toast-data" data-message="{{ session('error') }}" data-type="error" hidden></div>
    @endif

    {{-- Toast container --}}
    <div id="toast-container" class="toast-container" aria-live="polite" aria-atomic="false"></div>

    {{-- Custom confirm modal (replaces browser confirm()) --}}
    <div id="confirm-overlay" class="confirm-overlay" hidden role="dialog" aria-modal="true" aria-labelledby="confirm-modal-msg">
        <div class="confirm-modal">
            <div class="confirm-modal-icon"><x-icon name="alert-triangle" class="icon-lg" /></div>
            <p class="confirm-modal-msg" id="confirm-modal-msg">Are you sure?</p>
            <p class="confirm-modal-submsg" id="confirm-modal-submsg"></p>
            <div class="confirm-modal-actions">
                <button id="confirm-ok" class="btn btn-primary">Yes, proceed</button>
                <button id="confirm-cancel" class="btn btn-secondary">Cancel</button>
            </div>
        </div>
    </div>

    <main class="page-container">
        @if ($errors->any())
            <div class="alert alert-error">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="footer">
        <small>YQL DNA Portal &mdash; YellowQuip Zambia LTD &mdash; Authorized Access Only. All Activity Logged. Data Encrypted.</small>
    </footer>

    <script src="{{ asset('js/theme-toggle.js') }}"></script>
    <script src="{{ asset('js/portal.js') }}"></script>
    @yield('scripts')
</body>
</html>
