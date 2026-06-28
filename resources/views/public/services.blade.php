@extends('layouts.public')
@section('title', 'Services — Yellowquip Zambia Limited')
@section('meta_description', "Yellowquip's services keep operations running smoothly, safely, and efficiently — from consulting and ISO auditing to maintenance, parts supply, and training.")

@section('content')

@php
    $services = [
        [
            'icon' => 'message-circle',
            'image' => 'service-consulting-01.jpg',
            'title' => 'Consulting',
            'desc' => "Yellowquip's consulting service offers tailored advice and expertise to guide operational improvement and project success. From strategy development to practical implementation, the company partners with clients to support measurable results.",
        ],
        [
            'icon' => 'check-circle',
            'image' => 'service-iso-auditing-01.jpg',
            'title' => 'ISO Auditing',
            'desc' => 'ISO Auditing supports compliance with standards such as ISO 9001 for quality, ISO 45001 for safety, ISO 14001 for environmental responsibility, ISO 55001 for rental or asset management, and ISO 27001 for information security.',
            'focus' => [
                'Verify compliance',
                'Identify risks and gaps',
                'Support certification and recertification',
                'Boost credibility through global best practices',
                'Plan audit lifecycle, scope, objectives, and criteria',
                'Review documents, interview staff, and inspect processes',
                'Report findings, non-conformities, and recommendations',
                'Support corrective actions and surveillance audit preparation',
            ],
        ],
        [
            'icon' => 'package',
            'image' => 'service-equipment-parts-supply-01.jpg',
            'title' => 'Marketing of Equipment and Parts Supply',
            'desc' => 'Yellowquip supports equipment and parts supply by providing genuine components for fast replacement, reduced downtime, and sourcing of units suited to project environments.',
        ],
        [
            'icon' => 'file-text',
            'image' => 'service-rfq-submission-01.jpg',
            'title' => 'Request for Quotation (RFQ) Submission',
            'desc' => 'Yellowquip supports quotation requests by reviewing customer inquiries and preparing tailored offers based on pricing, availability, and service terms. The company looks forward to supporting project needs and future quotation requests.',
        ],
        [
            'icon' => 'search',
            'image' => 'service-technical-repair-diagnostic-01.jpg',
            'title' => 'Technical Repair and Diagnostic',
            'desc' => 'Yellowquip provides precision-driven repair and diagnostic solutions for heavy equipment. Expert technicians perform thorough diagnostics and reliable repairs to keep machinery operating at peak performance, onsite and with minimal disruption.',
        ],
        [
            'icon' => 'tool',
            'image' => 'service-heavy-equipment-maintenance-01.jpg',
            'title' => 'Heavy Equipment Maintenance',
            'desc' => 'Rehabilitation, repair, servicing, diagnostics, and overhaul of excavators, bulldozers, motor graders, wheel loaders, hydraulic rock breakers, and equipment components.',
        ],
        [
            'icon' => 'alert-triangle',
            'image' => 'service-parts-mining-equipment-supply-01.jpg',
            'title' => 'Parts and Mining Equipment Supply',
            'desc' => 'Supply of underground and open-pit mining equipment parts and project-suitable units to support customer operations and reduce downtime.',
        ],
        [
            'icon' => 'truck',
            'image' => 'service-earthmoving-mining-jobs-01.jpg',
            'title' => 'Earthmoving and Mining-Related Jobs',
            'desc' => 'Yellowquip supports earthmoving and mining-related works through trained personnel, equipment coordination, and practical site support.',
        ],
        [
            'icon' => 'book-open',
            'image' => 'service-apprenticeship-training-01.jpg',
            'title' => 'Apprenticeship Training Program',
            'desc' => 'A structured program for developing technical skills, workplace discipline, equipment awareness, and industry readiness among apprentices.',
        ],
        [
            'icon' => 'users',
            'image' => 'service-operators-training-01.jpg',
            'title' => 'Operators Training',
            'desc' => 'Training for students and workers operating various heavy equipment types, with focus on safe handling, practical operation, and proficiency.',
        ],
        [
            'icon' => 'tool',
            'image' => 'service-artisan-training-01.jpg',
            'title' => 'Artisan Training Program',
            'desc' => 'A hands-on technical training program designed to strengthen artisan skills in support of equipment maintenance, repair, and site operations.',
        ],
        [
            'icon' => 'bar-chart',
            'image' => 'service-fleet-management-01.jpg',
            'title' => 'Fleet Management Services',
            'desc' => 'Fleet management support helps customers maximize uptime, reduce costs, and keep equipment in the right location and condition through monitoring, maintenance coordination, and deployment planning.',
        ],
        [
            'icon' => 'file-text',
            'image' => 'service-contract-management-01.jpg',
            'title' => 'Contract Management Services',
            'desc' => 'Contract management support promotes clarity, compliance, transparency, and control from contract drafting to execution and renewal.',
        ],
        [
            'icon' => 'settings',
            'title' => 'Maintenance and Repair Contract Services',
            'desc' => 'Maintenance and repair support for industrial, mining, and construction equipment, including servicing and commissioning of loaders, compressors, generator sets, pumps, motors, and related machinery.',
        ],
    ];
@endphp

{{-- Page header --}}
<section class="hero-banner services-hero">
    <div class="home-hero-inner">
        <h1>Services</h1>
        <p class="hero-subtitle">Empowering Progress, One Service at a Time.</p>
        <p class="hero-desc">
            At Yellowquip, we do not just rent equipment — we deliver performance, reliability,
            and peace of mind. Our services are designed to keep operations running smoothly,
            safely, and efficiently, regardless of project scale or complexity.
        </p>
    </div>
</section>

{{-- Service cards --}}
<section class="public-section">
    <h2>What We Offer</h2>
    <p class="section-intro">
        From preventive maintenance to on-site technical support, the Yellowquip team brings
        precision and care to every task. Downtime is costly, so service is treated as a
        practical solution focused on reliability, safety, and uptime.
    </p>
    <div class="card-grid services-grid">
        @foreach ($services as $service)
            <div class="service-card">
                @if (!empty($service['image']))
                    <img src="{{ asset('assets/images/services/' . $service['image']) }}"
                         alt="{{ $service['title'] }} — Yellowquip Zambia Limited"
                         class="service-card-img"
                         loading="lazy"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='block';">
                    <x-icon :name="$service['icon']" class="service-icon" style="display:none;" />
                @else
                    <x-icon :name="$service['icon']" class="service-icon" />
                @endif
                <div class="service-body">
                    <h3>{{ $service['title'] }}</h3>
                    <p>{{ $service['desc'] }}</p>

                    @if (!empty($service['focus']))
                        <p class="service-key-focus-label">Key Focus:</p>
                        <ul class="service-key-focus">
                            @foreach ($service['focus'] as $point)
                                <li>{{ $point }}</li>
                            @endforeach
                        </ul>
                    @endif

                    <a href="{{ route('public.contact') }}" class="service-cta">Enquire &rsaquo;</a>
                </div>
            </div>
        @endforeach
    </div>
</section>

{{-- Closing statement --}}
<section class="public-section">
    <div class="lease-cta-box">
        <h3>Smart service. Stronger uptime. Trusted expertise.</h3>
        <p>
            If you have a specific equipment, training, or operational support need,
            get in touch and our team will respond with the right information.
        </p>
        <a href="{{ route('public.contact') }}" class="btn btn-accent btn-lg">Contact Us</a>
    </div>
</section>

@endsection
