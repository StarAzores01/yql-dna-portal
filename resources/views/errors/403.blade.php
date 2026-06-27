@extends('layouts.guest')

@section('content')
<div class="auth-card">
    <h1 class="auth-title">403 &mdash; Access Denied</h1>
    <p>You do not have permission to view this page. This attempt has been logged.</p>
    <a href="{{ url('/') }}" class="btn btn-primary">Return to Home</a>
</div>
@endsection
