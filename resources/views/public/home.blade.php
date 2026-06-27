@extends('layouts.public')

@section('title', 'Yellowquip Zambia Limited - est. 2008')
@section('meta_description', 'Provides heavy equipment like excavators, bulldozers, motor graders, and wheel loaders and Hydraulic Rock Breaker.')

@section('content')
<section class="hero-banner">
    <img src="{{ asset('images/yql-logo.png') }}" alt="Yellowquip Zambia Limited" class="hero-logo">
    <h1>Yellow<span>quip</span> Zambia Limited</h1>
    <p>Tools You Trust, Rentals You Rely On. ISO 45001, 9001, 14001, 27001 &amp; 55001 compliant heavy equipment rental, maintenance, and training &mdash; serving the Copperbelt since 2008.</p>
    <a href="{{ route('public.services') }}" class="btn btn-accent btn-lg">Explore Our Services</a>
</section>

<section class="public-section">
    <h2>What We Do</h2>
    <p class="section-intro">From earthmoving machinery to skilled-trades training, YellowQuip keeps mining and construction projects across Zambia moving.</p>
    <div class="card-grid">
        <div class="info-card"><h3>Heavy Equipment Maintenance</h3><p>Rehabilitation, repair, servicing and overhaul of excavators, bulldozers, motor graders, wheel loaders and hydraulic rock breakers.</p></div>
        <div class="info-card"><h3>Parts &amp; Mining Equipment Supply</h3><p>Underground and open-pit parts and equipment supply, sourced ex-stock or through our regional partner network.</p></div>
        <div class="info-card"><h3>Earthmoving &amp; Mining Jobs</h3><p>Contracted earthmoving and mining-related works delivered by trained, safety-certified crews.</p></div>
        <div class="info-card"><h3>Apprenticeship Training</h3><p>Structured apprenticeship programs building the next generation of heavy-equipment technicians.</p></div>
        <div class="info-card"><h3>Operators Training</h3><p>Certified training for plant and heavy-equipment operators across multiple machine classes.</p></div>
        <div class="info-card"><h3>Artisan Training Program</h3><p>Hands-on artisan skills development aligned with industry and OEM standards.</p></div>
    </div>
</section>

<section class="public-section">
    <h2>Why YellowQuip</h2>
    <p class="section-intro">Five pillars guide everything we do.</p>
    <div class="card-grid">
        <div class="info-card"><h3>Safety First, Always</h3><p>ISO 45001 isn't just a certificate &mdash; it's our culture. We train, we inspect, we prevent.</p></div>
        <div class="info-card"><h3>Service That Sticks</h3><p>Customers don't rent steel, they rent trust. We deliver on time and communicate clearly.</p></div>
        <div class="info-card"><h3>Smart Fleet, Lean Ops</h3><p>Preventive maintenance, digital tracking, and fleet optimization keep us agile and cost-effective.</p></div>
        <div class="info-card"><h3>People Powered</h3><p>From operators to apprentices, we invest in skills, pride, and purpose.</p></div>
    </div>
</section>
@endsection
