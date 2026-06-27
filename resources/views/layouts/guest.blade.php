<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'YQL DNA Portal')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="guest-body">
    <main class="guest-container">
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @yield('content')
    </main>
    <footer class="footer">
        <small>YQL DNA Portal &mdash; Yellowquip Zambia LTD &mdash; Authorized Access Only. All Activity Logged. Data Encrypted.</small>
    </footer>
</body>
</html>
