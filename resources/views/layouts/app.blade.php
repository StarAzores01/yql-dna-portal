<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'YQL DNA Portal')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <header class="topbar">
        <div class="topbar-inner">
            <a href="{{ route('dashboard') }}" class="brand">YQL <span>DNA Portal</span></a>
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
            </nav>
            <form method="POST" action="{{ route('logout') }}" class="logout-form">
                @csrf
                <span class="user-chip">{{ auth()->user()->name }} ({{ auth()->user()->role }})</span>
                <button type="submit">Logout</button>
            </form>
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
</body>
</html>
