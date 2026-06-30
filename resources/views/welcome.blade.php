@extends('layouts.guest')

@section('content')
<div class="landing-hero">
    <h1>YQL <span>DNA Portal</span></h1>
    <p class="landing-tagline">Access Your Compliance Hub</p>
    <p class="landing-org">YellowQuip Zambia LTD</p>
    <p class="landing-desc">
        A secure internal document repository for SOPs, policies, audit dashboards,
        recognition updates, and bulletins &mdash; built for controlled, role-based
        access and full activity traceability.
    </p>
    <a href="{{ route('login') }}" class="btn btn-primary btn-lg">Login</a>
</div>
@endsection
