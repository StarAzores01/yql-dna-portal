@extends('layouts.guest')

@section('content')
<div class="auth-card">
    <h1 class="auth-title">YQL DNA Portal</h1>
    <p class="auth-subtitle">Secure Login</p>

    @if ($errors->any())
        <div class="alert alert-error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('login.attempt') }}">
        @csrf
        <label for="login">Employee ID or Email</label>
        <input type="text" id="login" name="login" value="{{ old('login') }}" required autofocus>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>

        <label class="checkbox-row">
            <input type="checkbox" name="remember"> Remember me
        </label>

        <button type="submit" class="btn btn-primary btn-block">Login</button>
    </form>

    <a href="#" class="forgot-link" title="Contact your administrator to reset your password">Forgot password?</a>

    <div class="security-badges">
        <span>🔒 Authorized Access Only</span>
        <span>📋 All Activity Logged</span>
        <span>🔐 Data Encrypted</span>
    </div>
</div>
@endsection
