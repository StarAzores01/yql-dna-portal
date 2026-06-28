@extends('layouts.public')

@section('title', 'Yellowquip Zambia Limited — YQL DNA Portal')
@section('meta_description', 'Yellowquip Zambia Limited provides heavy equipment rental, maintenance, training, and ISO-aligned operational support in the Copperbelt, Zambia. Est. 2008.')

@section('content')

{{-- ============================================================
     HERO
     ============================================================ --}}
<section class="hero-banner home-hero has-bg-image" style="background-image: linear-gradient(rgba(20,26,34,.6), rgba(20,26,34,.6)), url('{{ asset('assets/images/hero/home-hero-equipment-01.jpg') }}');">
    <div class="home-hero-inner">
        <img src="{{ asset('assets/images/brand/yql-logo.png') }}"
             alt="Yellowquip Zambia Limited — heavy equipment services, est. 2008"
             class="hero-logo"
             width="150" height="150"
             onerror="this.alt='Yellowquip Zambia Limited'">

        <h1>Yellow<span>quip</span> Zambia Limited</h1>

        <p class="hero-subtitle">Tools You Trust, Rentals You Rely On.</p>

        <p class="hero-desc">
            Yellowquip Zambia Limited is a heavy equipment rental, maintenance, training,
            and ISO-aligned operations company based in Chingola, Copperbelt, Zambia.
            Established in 2008, Yellowquip supports mining, construction, industrial,
            and maintenance operations through reliable equipment services, skilled
            training, technical support, and organized compliance practices.
        </p>

        <div class="hero-cta-group">
            <a href="{{ route('public.services') }}" class="btn btn-accent btn-lg">Explore Our Services</a>
            @auth
                <a href="{{ route('dashboard') }}" class="btn btn-outline-light btn-lg">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="btn btn-outline-light btn-lg">Member Login</a>
            @endauth
        </div>
    </div>
</section>

{{-- ============================================================
     WHAT WE DO
     ============================================================ --}}
<section class="public-section">
    <h2>What We Do</h2>
    <p class="section-intro">
        From heavy equipment maintenance to structured trade training, Yellowquip keeps
        mining and construction operations across Zambia running safely and efficiently.
    </p>
    <div class="card-grid">

        <div class="info-card">
            <h3>Heavy Equipment Maintenance</h3>
            <p>Rehabilitation, repair, servicing, diagnostics, and overhaul of excavators,
               bulldozers, motor graders, wheel loaders, and hydraulic rock breakers.</p>
        </div>

        <div class="info-card">
            <h3>Parts &amp; Mining Equipment Supply</h3>
            <p>Supply of underground and open-pit mining equipment parts through trusted
               sourcing and partner networks.</p>
        </div>

        <div class="info-card">
            <h3>Earthmoving &amp; Mining Jobs</h3>
            <p>Contracted earthmoving and mining-related work delivered by trained and
               safety-conscious crews.</p>
        </div>

        <div class="info-card">
            <h3>Apprenticeship Training</h3>
            <p>Structured apprenticeship programs that develop hands-on technical skills
               for aspiring equipment technicians.</p>
        </div>

        <div class="info-card">
            <h3>Operators Training</h3>
            <p>Practical operator training for plant and heavy equipment across multiple
               machine classes.</p>
        </div>

        <div class="info-card">
            <h3>Artisan Training Program</h3>
            <p>Hands-on artisan skills development aligned with industry standards, safety
               practices, and equipment servicing requirements.</p>
        </div>

    </div>
</section>

{{-- ============================================================
     WHY YELLOWQUIP
     ============================================================ --}}
<section class="public-section home-why">
    <h2>Why YellowQuip</h2>
    <p class="section-intro">
        Every service we provide is grounded in practical industry experience,
        a safety-first culture, and a commitment to developing people alongside equipment.
    </p>
    <div class="card-grid">

        <div class="info-card">
            <h3>Safety First, Always</h3>
            <p>Safety is embedded in our work culture, training, inspections,
               and daily site practices.</p>
        </div>

        <div class="info-card">
            <h3>ISO-Aligned Operations</h3>
            <p>Yellowquip works toward compliance with ISO 45001, ISO 9001, ISO 14001,
               ISO 27001, and ISO 55001 standards.</p>
        </div>

        <div class="info-card">
            <h3>Reliable Service Support</h3>
            <p>We focus on preventive maintenance, responsive technical support,
               and reduced equipment downtime.</p>
        </div>

        <div class="info-card">
            <h3>Customer Satisfaction</h3>
            <p>Yellowquip aims to meet customer demand and go beyond expectations
               through dependable service delivery.</p>
        </div>

        <div class="info-card">
            <h3>People &amp; Skills Development</h3>
            <p>Through apprenticeship, operator, and artisan training, Yellowquip
               invests in people as part of long-term operational success.</p>
        </div>

    </div>
</section>

{{-- ============================================================
     QUICK LINKS
     ============================================================ --}}
<section class="public-section home-quick-links">
    <h2>Quick Links</h2>
    <p class="section-intro">
        Jump straight to the information you need most.
    </p>
    <div class="card-grid quick-links-grid">

        <a href="{{ route('public.lease') }}" class="info-card quick-link-card">
            <h3>Lease &amp; Equipment Rental &rsaquo;</h3>
        </a>

        <a href="{{ route('public.services') }}" class="info-card quick-link-card">
            <h3>Services &rsaquo;</h3>
        </a>

        <a href="{{ route('public.project-gallery') }}" class="info-card quick-link-card">
            <h3>Project Gallery &rsaquo;</h3>
        </a>

        <a href="{{ route('public.articles') }}" class="info-card quick-link-card">
            <h3>Articles &rsaquo;</h3>
        </a>

        <a href="{{ route('public.contact') }}" class="info-card quick-link-card">
            <h3>Contact Us &rsaquo;</h3>
        </a>

        @auth
            <a href="{{ route('dashboard') }}" class="info-card quick-link-card">
                <h3>Dashboard &rsaquo;</h3>
            </a>
        @else
            <a href="{{ route('login') }}" class="info-card quick-link-card">
                <h3>Member Login &rsaquo;</h3>
            </a>
        @endauth

    </div>
</section>

@endsection
