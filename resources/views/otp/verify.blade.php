@extends('layouts.guest')

@section('content')
<div class="auth-card">
    <h1 class="auth-title">Verify OTP</h1>
    <p class="auth-subtitle">Enter the 6-digit code sent to you</p>

    <form method="POST" action="{{ route('otp.verify') }}">
        @csrf
        <label for="otp_code">OTP Code</label>
        <input type="text" id="otp_code" name="otp_code" maxlength="6" pattern="\d{6}" required autofocus>
        <button type="submit" class="btn btn-primary btn-block">Verify</button>
    </form>

    <form method="POST" action="{{ route('otp.resend') }}">
        @csrf
        <button type="submit" class="btn-link">Resend code</button>
    </form>
</div>
@endsection
