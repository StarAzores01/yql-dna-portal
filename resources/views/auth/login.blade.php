@extends('layouts.guest')
 
@section('content')
<div class="auth-card">
    <img src="{{ asset('assets/images/brand/yql-logo.png') }}" alt="Yellowquip Zambia Limited" class="auth-logo">
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
        <div class="password-field">
            <input type="password" id="password" name="password" required>
            <button type="button" class="password-toggle-btn" data-target="password" aria-label="Show password" aria-pressed="false">
                <x-icon name="eye" class="icon-sm password-toggle-icon-show" />
                <x-icon name="eye-off" class="icon-sm password-toggle-icon-hide" style="display:none;" />
            </button>
        </div>

        <label class="checkbox-row">
            <input type="checkbox" name="remember"> Remember me
        </label>

        <button type="submit" class="btn btn-accent btn-block">Login</button>
    </form>

    <a href="{{ route('password.request') }}" class="forgot-link" title="Contact your administrator to reset your password">Forgot password?</a>
 
    <div class="security-badges">
        <span><x-icon name="lock" class="icon-sm" /> Authorized Access Only</span>
        <span><x-icon name="clipboard" class="icon-sm" /> All Activity Logged</span>
        <span><x-icon name="shield" class="icon-sm" /> Data Encrypted</span>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/password-toggle.js') }}"></script>
@endsection