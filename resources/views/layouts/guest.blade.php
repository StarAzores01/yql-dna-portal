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
<body class="guest-body">
    <button type="button" class="theme-toggle theme-toggle-floating" onclick="window.YQL_toggleTheme()" aria-label="Toggle dark mode">
        <span class="theme-icon-light"><x-icon name="sun" /></span>
        <span class="theme-icon-dark"><x-icon name="moon" /></span>
    </button>
    <main class="guest-container">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @yield('content')
    </main>
    <footer class="footer">
        <small>YQL DNA Portal &mdash; Yellowquip Zambia LTD &mdash; Authorized Access Only. All Activity Logged. Data Encrypted.</small>
        <br><small><a href="{{ route('landing') }}" style="color: var(--yql-gold);">&larr; Back to public site</a></small>
    </footer>
    <script src="{{ asset('js/theme-toggle.js') }}"></script>
    @yield('scripts')
</body>
</html>
