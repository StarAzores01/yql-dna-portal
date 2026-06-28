<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'YQL DNA Portal')</title>
    <link rel="icon" href="{{ asset('assets/images/brand/yql-favicon.png') }}">
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
    <header class="topbar">
        <div class="topbar-inner">
            <a href="{{ route('dashboard') }}" class="brand">
                <img src="{{ asset('assets/images/brand/yql-logo.png') }}" alt="Yellowquip Zambia Limited">
                YQL <span>DNA Portal</span>
            </a>
            @auth
            <nav class="nav-links">
                <a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'active' : '' }}">Dashboard</a>
                <a href="{{ route('documents.index') }}" class="{{ request()->routeIs('documents.*') && !request()->routeIs('documents.create') ? 'active' : '' }}">Documents</a>
                <a href="{{ route('documents.create') }}" class="{{ request()->routeIs('documents.create') ? 'active' : '' }}">Upload</a>
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('users.index') }}" class="{{ request()->routeIs('users.*') ? 'active' : '' }}">Users</a>
                    <a href="{{ route('audit-logs.index') }}" class="{{ request()->routeIs('audit-logs.*') ? 'active' : '' }}">Audit Logs</a>
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

    <main class="page-container">
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

        @yield('content')
    </main>

    <footer class="footer">
        <small>YQL DNA Portal &mdash; Yellowquip Zambia LTD &mdash; Authorized Access Only. All Activity Logged. Data Encrypted.</small>
    </footer>

    <script src="{{ asset('js/theme-toggle.js') }}"></script>
</body>
</html>
