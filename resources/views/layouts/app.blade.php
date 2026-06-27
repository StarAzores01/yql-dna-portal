<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'YQL DNA Portal')</title>
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
                <img src="{{ asset('images/yql-logo.png') }}" alt="Yellowquip Zambia Limited">
                YQL <span>DNA Portal</span>
            </a>
            @auth
            <nav class="nav-links">
                <a href="{{ route('dashboard') }}">Dashboard</a>
                <a href="{{ route('documents.index') }}">Documents</a>
                @if(auth()->user()->role === 'admin')
                    <a href="{{ route('documents.create') }}">Upload</a>
                    <a href="{{ route('users.index') }}">Users</a>
                @endif
                @if(in_array(auth()->user()->role, ['admin', 'auditor']))
                    <a href="{{ route('audit-logs.index') }}">Audit Logs</a>
                @endif
                <a href="{{ route('landing') }}">Public Site</a>
            </nav>
            <div class="topbar-actions">
                <button type="button" class="theme-toggle" onclick="window.YQL_toggleTheme()" aria-label="Toggle dark mode">
                    <span class="theme-icon-light">&#9728;</span>
                    <span class="theme-icon-dark">&#9789;</span>
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
