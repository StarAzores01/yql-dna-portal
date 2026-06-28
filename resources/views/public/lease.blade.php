@extends('layouts.public')
@section('title', 'Lease — Yellowquip Zambia Limited')
@section('meta_description', "Yellowquip's lease packages give customers flexible equipment options based on project needs, duration, support requirements, and operational priorities.")

@section('content')

@php
    $leaseServices = [
        [
            'code' => 'LSS',
            'image' => 'lease-structuring-services-01.jpg',
            'name' => 'Lease Structuring Services (LSS)',
            'desc' => 'Lease Structuring Services are designed to enhance safety, efficiency, and equipment handling across operations. This service supports the review of current lease protocols and helps implement improvements for better control, reduced risk, ISO alignment, and improved revenue performance.',
            'cta' => 'We are on call — Contact Us.',
        ],
        [
            'code' => 'PPMS',
            'image' => 'lease-preventive-maintenance-01.jpg',
            'name' => 'Professional Preventive Maintenance Servicing (PPMS)',
            'desc' => 'Professional Preventive Maintenance Servicing helps prevent breakdowns through regular checkups, equipment servicing, technical consulting, field services, diagnostics, repairs, performance tuning, and ISO-aligned support for safety, quality, and environmental impact.',
            'inclusions' => ['Preventive maintenance', 'Technical consulting', 'Field services', 'ISO-aligned support'],
            'cta' => 'We are on call — Contact Us.',
        ],
        [
            'code' => 'ERPHS',
            'image' => 'lease-equipment-rental-plant-hire-01.jpg',
            'name' => 'Equipment Rental and Plant Hire Services (ERPHS)',
            'desc' => 'Yellowquip provides reliable and cost-effective equipment rental solutions tailored to project needs. The fleet includes well-maintained heavy machinery, tools, and specialized equipment available on flexible terms with expert support. Services support mining, construction, industrial, and maintenance work with focus on safety, efficiency, and timely execution.',
            'cta' => 'For equipment availability, we are on call — Contact Us.',
        ],
        [
            'code' => 'FMS',
            'image' => 'lease-fleet-management-01.jpg',
            'name' => 'Fleet Management Services (FMS)',
            'desc' => 'Fleet Management Services help ensure that equipment is in the right place, at the right time, and in optimal condition. The service supports monitoring, preventive maintenance, and strategic deployment to maximize uptime, minimize costs, and support project execution in line with ISO standards.',
            'cta' => 'We are on call 24/7 — Contact Us.',
        ],
        [
            'code' => 'CMS',
            'image' => 'lease-contract-management-01.jpg',
            'name' => 'Contract Management Services (CMS)',
            'desc' => 'Contract Management Services support clarity, compliance, and control throughout the project lifecycle. From drafting to execution and renewal, the process promotes transparency, reduces risk, and strengthens stakeholder collaboration.',
            'cta' => 'Contact Us — We are on call.',
        ],
        [
            'code' => 'MARCS',
            'image' => 'lease-maintenance-support-01.jpg',
            'name' => 'Maintenance and Repair Contract Services (MARCS)',
            'desc' => 'Yellowquip provides comprehensive maintenance and repair services for industrial, mining, and construction equipment. The technical team supports rebuilding, servicing, and commissioning of heavy machinery such as loaders, compressors, generator sets, pumps, motors, and related equipment.',
            'cta' => 'We are on call 24/7 — Contact Us.',
        ],
    ];
@endphp

{{-- Page header --}}
<section class="hero-banner lease-hero">
    <div class="home-hero-inner">
        <h1>Lease</h1>
        <p class="hero-subtitle">Where Every Lease Drives Value.</p>
        <p class="hero-desc">
            Yellowquip's lease packages are designed to give customers flexible equipment
            options based on project needs, duration, support requirements, and operational
            priorities.
        </p>
    </div>
</section>

{{-- Lease package summary --}}
<section class="public-section">
    <h2>Lease Package Summary</h2>
    <div class="card-grid">

        <div class="info-card">
            <div class="lease-tier-badge">Basic</div>
            <h3>Basic Rentals</h3>
            <p>Basic rentals for short-term needs.</p>
        </div>

        <div class="info-card">
            <div class="lease-tier-badge lease-tier-badge--premium">Premium</div>
            <h3>Premium Packages</h3>
            <p>Premium packages with operators, fuel, and priority support.</p>
        </div>

        <div class="info-card">
            <div class="lease-tier-badge lease-tier-badge--standard">Long-Term</div>
            <h3>Long-Term Contracts</h3>
            <p>Long-term contracts with maintenance and performance guarantees.</p>
        </div>

    </div>
</section>

{{-- Lease service sections --}}
<section class="public-section lease-services-section">
    <h2>Lease Service Sections</h2>
    <div class="card-grid services-grid">
        @foreach ($leaseServices as $service)
            <div class="service-card lease-service-card">
                <img src="{{ asset('assets/images/lease/' . $service['image']) }}"
                     alt="{{ $service['name'] }} — Yellowquip Zambia Limited"
                     class="service-card-img"
                     loading="lazy"
                     onerror="this.style.display='none';">
                <div class="service-body">
                    <h3>{{ $service['name'] }}</h3>
                    <p>{{ $service['desc'] }}</p>

                    @if (!empty($service['inclusions']))
                        <p class="lease-key-inclusions-label">Key Inclusions:</p>
                        <ul class="lease-key-inclusions">
                            @foreach ($service['inclusions'] as $inclusion)
                                <li>{{ $inclusion }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <a href="{{ route('public.contact') }}" class="service-cta">{{ $service['cta'] }}</a>
                </div>
            </div>
        @endforeach
    </div>
</section>

{{-- CTA --}}
<section class="public-section lease-cta-section">
    <div class="lease-cta-box">
        <h3>Ready to discuss equipment rental?</h3>
        <p>
            Contact Yellowquip for current rental availability, equipment specifications,
            and service arrangements tailored to your project.
        </p>
        <a href="{{ route('public.contact') }}" class="btn btn-accent btn-lg">Get in Touch</a>
    </div>
</section>

@endsection
