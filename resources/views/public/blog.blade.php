@extends('layouts.public')
@section('title', 'Blog — YellowQuip Zambia Limited')
@section('meta_description', "Updates, practical notes, and public insights from YellowQuip on safety culture, rental operations, ISO-aligned systems, and the YQL DNA platform.")

@section('content')

@php
    $posts = [
        [
            'title' => 'SOP Awareness: Why Standard Procedures Matter',
            'image' => 'blog-sop-awareness.jpg',
            'excerpt' => 'SOPs help YellowQuip promote safe work, consistent equipment handling, better documentation, and stronger compliance. Controlled SOP files are available only to authorized users through the Member Portal.',
            'ctaText' => "Need to know more about YellowQuip's operations or services?",
            'ctaButton' => 'Contact Us',
        ],
        [
            'title' => '7 Big Things a Start-Up Must Have to Succeed',
            'image' => 'blog-startup-success.jpg',
            'excerpt' => 'A strong business needs a clear purpose, reliable systems, disciplined finances, customer focus, skilled people, process control, and continuous improvement.',
            'ctaText' => 'Building something that needs reliable equipment or operational support?',
            'ctaButton' => 'Work With Us',
        ],
        [
            'title' => '9 Steps to Starting a Business',
            'image' => 'blog-starting-business.jpg',
            'excerpt' => 'Starting a business requires identifying a real need, planning operations, building the right team, managing resources, serving customers well, and improving every step of the way.',
            'ctaText' => 'Partner with a team that understands operations, equipment, and service delivery.',
            'ctaButton' => 'Become One of Our Partners',
        ],
        [
            'title' => '10 Rules to Build a Wildly Successful Business',
            'image' => 'blog-business-rules.jpg',
            'excerpt' => 'Sustainable business success comes from discipline, consistent service, customer value, reliable systems, strong leadership, and long-term trust.',
            'ctaText' => "Let YellowQuip support your next operation or project.",
            'ctaButton' => 'Start an Inquiry',
        ],
        [
            'title' => 'YQL DNA Member Repository',
            'image' => 'blog-yql-dna-member-repository.jpg',
            'excerpt' => "YQL DNA is YellowQuip's controlled digital repository for authorized users. It supports SOP access, compliance records, training references, and operational documentation.",
            'note' => 'This repository is not open for public registration. Access is reserved for approved YellowQuip staff, managers, auditors, and administrators.',
            'ctaText' => 'For partnership, service, rental, training, or platform-related inquiries, contact YellowQuip.',
            'ctaButton' => 'Contact the Team',
        ],
        [
            'title' => 'Safety First, Excellence Always',
            'image' => 'blog-safety-excellence.jpg',
            'excerpt' => 'At YellowQuip, safety is not just a checklist. It is a culture supported by inspections, training, clean audits, hazard reporting, and zero-incident goals.',
            'ctaText' => 'Work with a team that values safety and quality.',
            'ctaButton' => 'Connect With Us',
        ],
        [
            'title' => 'Smart Pricing and Tiered Rental Packages',
            'image' => 'blog-smart-pricing-rentals.jpg',
            'excerpt' => 'Smart pricing helps rental companies adjust rates based on demand, equipment type, duration, urgency, and service value. Tiered packages can help customers choose the level of support they need.',
            'ctaText' => "Ask about YellowQuip's rental options and support packages.",
            'ctaButton' => 'Ask About Rentals',
        ],
    ];
@endphp

<section class="hero-banner blog-hero">
    <div class="home-hero-inner">
        <h1>Blog</h1>
        <p class="hero-subtitle">Updates, practical notes, and public insights from YellowQuip.</p>
        <p class="hero-desc">
            Read short updates and practical insights about YellowQuip's safety culture, rental operations,
            ISO-aligned systems, planning practices, and YQL DNA platform.
        </p>
    </div>
</section>

<section class="public-section">

    <div class="blog-list">
        @foreach ($posts as $post)
            <article class="blog-post-card">
                <div class="blog-card-image">
                    <img src="{{ asset('assets/images/blog/' . $post['image']) }}"
                         alt="{{ $post['title'] }}"
                         loading="lazy"
                         onerror="if (!this.dataset.fallback) { this.dataset.fallback='1'; this.src='{{ asset('assets/images/placeholders/placeholder-blog.jpg') }}'; } else { this.style.display='none'; this.nextElementSibling.style.display='flex'; }">
                    <div class="gallery-placeholder" style="display:none;">
                        <x-icon name="camera" class="icon-lg" />
                    </div>
                </div>
                <h3>{{ $post['title'] }}</h3>
                <p>{{ $post['excerpt'] }}</p>

                @if (!empty($post['note']))
                    <p class="article-public-note"><strong>Public Note:</strong> {{ $post['note'] }}</p>
                @endif

                <div class="article-cta-box">
                    <p>{{ $post['ctaText'] }}</p>
                    <a href="{{ route('public.contact') }}" class="btn btn-accent btn-sm">{{ $post['ctaButton'] }}</a>
                </div>
            </article>
        @endforeach
    </div>

</section>

{{-- Bottom CTA section --}}
<section class="public-section">
    <div class="lease-cta-box">
        <h3>Ready to work with YellowQuip?</h3>
        <p>
            Whether you need reliable equipment rentals, maintenance support, operator training,
            ISO-aligned operational guidance, or partnership opportunities, the YellowQuip team
            is ready to assist.
        </p>
        <div class="cta-row">
            <a href="{{ route('public.contact') }}" class="btn btn-accent btn-lg">Contact Us</a>
            <a href="{{ route('public.services') }}" class="btn btn-outline-light btn-lg">Explore Services</a>
        </div>
    </div>
</section>

@endsection
