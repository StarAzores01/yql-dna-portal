@extends('layouts.public')
@section('title', 'About Yellowquip Zambia Limited')
@section('meta_description', 'Yellowquip Zambia Limited was established in 2008 and operates from Chingola, Copperbelt, Zambia, providing heavy equipment rental, maintenance, parts, training, and ISO-aligned operations.')

@section('content')

<section class="hero-banner about-hero">
    <div class="home-hero-inner">
        <h1>About <span>Yellowquip</span></h1>
        <p class="hero-desc">
            Yellowquip Zambia Limited was established in 2008 and operates from Chingola,
            Copperbelt, Zambia. The company provides heavy equipment rental, equipment
            maintenance, parts support, technical services, training, and project-related
            support for mining, construction, industrial, and maintenance operations.
        </p>
    </div>
</section>

<section class="public-section about-photo-strip">
    <div class="card-grid about-photo-grid">
        <div class="about-photo-placeholder">
            <img src="{{ asset('assets/images/gallery/equipment/gallery-mining-equipment-openpit-01.png') }}"
                 alt="Yellowquip equipment and site operations"
                 loading="lazy">
        </div>
        <div class="about-photo-placeholder">
            <img src="{{ asset('assets/images/gallery/field/gallery-field-operation-01.jpg') }}"
                 alt="Yellowquip team at work"
                 loading="lazy">
        </div>
        <div class="about-photo-placeholder">
            <img src="{{ asset('assets/images/gallery/operators/gallery-heavy-equipment-operator-training-01.jpg') }}"
                 alt="Yellowquip training activity"
                 loading="lazy">
        </div>
    </div>
</section>

<section class="public-section">
    <h2>Company Mission</h2>
    <p class="section-intro">
        Yellowquip is dedicated to delivering high-quality customer service proactively and
        with value pricing. The company aims to establish successful partnerships with
        customers, employees, shareholders, and suppliers through service that respects the
        goals and interests of each stakeholder.
    </p>

    <div class="card-grid" style="margin-top: 40px;">
        <div class="info-card">
            <h3>Mission</h3>
            <p>
                Dedication to the highest quality of customer service, delivered
                proactively and supported by value-based pricing and reliable equipment.
            </p>
        </div>
        <div class="info-card">
            <h3>Partnership</h3>
            <p>
                We build successful, long-term partnerships with our customers, employees,
                shareholders, and suppliers — grounded in trust and mutual accountability.
            </p>
        </div>
        <div class="info-card">
            <h3>Standards</h3>
            <p>
                Success is measured by clients choosing us again — for our service quality,
                honest pricing, and consistent equipment availability.
            </p>
        </div>
    </div>
</section>

<section class="public-section about-yql-dna">
    <h2>YQL DNA</h2>
    <p class="section-intro">
        YQL DNA represents Yellowquip's organized approach to knowledge, compliance,
        documentation, training, and continuous improvement. It supports the company's
        commitment to ISO-aligned operations, safety, equipment reliability, and customer
        satisfaction.
    </p>

    <h3 class="section-subtitle" style="text-align:center;">Focus Areas</h3>
    <ul class="focus-areas-list">
        <li>Equipment rental and plant hire support</li>
        <li>Heavy equipment maintenance and repair</li>
        <li>Parts and mining equipment supply</li>
        <li>Operator, artisan, and apprenticeship training</li>
        <li>ISO-aligned documentation and compliance practices</li>
        <li>Customer-focused service delivery</li>
        <li>Audit readiness and continuous improvement</li>
    </ul>

    <div class="about-portal-cta">
        <p>
            YQL DNA is accessible to authorised Yellowquip staff through the Member Portal.
            No SOP content, internal manual filenames, or controlled document links
            are published on this public page.
        </p>
        @auth
            <a href="{{ route('dashboard') }}" class="btn btn-accent">Go to Portal</a>
        @else
            <a href="{{ route('login') }}" class="btn btn-accent">Member Login</a>
        @endauth
    </div>
</section>

<section class="public-section about-closing">
    <p class="section-intro" style="max-width: 760px;">
        Yellowquip continues to build a stronger operational foundation by combining
        practical equipment experience, skilled people, structured documentation, and a
        commitment to safety and quality.
    </p>
</section>

@endsection
