@extends('layouts.public')
@section('title', 'Contact Us — YellowQuip Zambia Limited')
@section('meta_description', 'Contact YellowQuip Zambia Limited for heavy equipment rental, maintenance, training, and ISO-aligned service enquiries. Based in Chingola, Copperbelt, Zambia.')

@section('content')

<section class="hero-banner contact-hero">
    <div class="home-hero-inner">
        <h1>Contact <span>Us</span></h1>
        <p class="hero-desc">
            We are here to connect, collaborate, and support your success. Whether you are
            looking for reliable equipment rentals, ISO-compliant solutions, or expert
            guidance on operational workflows, the YellowQuip team is ready to assist.
            Strong partnerships begin with open communication, and every inquiry is an
            opportunity to build something better together.
        </p>
    </div>
</section>

<section class="public-section">
    <h2>Get in Touch</h2>
    <p class="section-intro">
        YellowQuip Zambia Limited is based in Chingola, Copperbelt, Zambia.
    </p>

    <div class="contact-layout">

        {{--
            Public Safety Note: the numbers below are published per the content
            sheet's current direction. Before going to production, confirm with
            the organization whether these direct lines remain approved for public
            display — if not approved, replace with a general company phone number
            and general email address.
        --}}
        <div class="contact-details-card">
            <h3 class="contact-card-heading">YellowQuip Zambia Limited</h3>

            <div class="contact-item">
                <x-icon name="map-pin" class="contact-item-icon" />
                <div>
                    <strong>Address</strong>
                    <address>
                        6058 Kasompe Road<br>
                        Chingola South<br>
                        Copperbelt, Zambia
                    </address>
                </div>
            </div>

            <div class="contact-item">
                <x-icon name="phone" class="contact-item-icon" />
                <div>
                    <strong>YQL Managing Director</strong>
                    <a href="tel:+260963319619">+260 96 3319619</a>
                </div>
            </div>

            <div class="contact-item">
                <x-icon name="phone" class="contact-item-icon" />
                <div>
                    <strong>YQL Business Controller</strong>
                    <a href="tel:+260961418054">+260 96 1418054</a>
                </div>
            </div>

            <div class="contact-item">
                <x-icon name="phone" class="contact-item-icon" />
                <div>
                    <strong>YQL Parts Manager</strong>
                    <a href="tel:+260965123629">+260 96 5123629</a>
                </div>
            </div>

            <div class="contact-item">
                <x-icon name="phone" class="contact-item-icon" />
                <div>
                    <strong>Oversight</strong>
                    <a href="tel:+639154815037">+63 915 481 5037</a>
                </div>
            </div>

            <div class="contact-item">
                <x-icon name="mail" class="contact-item-icon" />
                <div>
                    <strong>Email</strong>
                    <a href="mailto:emmamuelg@yellowquip.com">emmamuelg@yellowquip.com</a>
                </div>
            </div>

            <div class="contact-item">
                <x-icon name="clock" class="contact-item-icon" />
                <div>
                    <strong>Business Hours</strong>
                    <span>Monday to Friday — 08:00 to 19:00</span>
                </div>
            </div>
        </div>

        {{-- Right column: inquiry form + map placeholder --}}
        <div class="contact-right-col">

            <form class="contact-inquiry-form" method="POST" action="{{ route('public.contact.submit') }}">
                @csrf
                <h4>Send an Inquiry</h4>

                {{-- Honeypot — hidden from real visitors, bots tend to fill every field --}}
                <input type="text" name="website" value="" autocomplete="off" tabindex="-1" class="hp-field" aria-hidden="true">

                <div class="form-group">
                    <label for="contact-name">Name</label>
                    <input type="text" id="contact-name" name="name" placeholder="Your full name" value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                    <label for="contact-phone">Phone</label>
                    <input type="tel" id="contact-phone" name="phone" placeholder="Your phone number" value="{{ old('phone') }}">
                </div>
                <div class="form-group">
                    <label for="contact-email">Email Address</label>
                    <input type="email" id="contact-email" name="email" placeholder="you@example.com" value="{{ old('email') }}" required>
                </div>
                <div class="form-group">
                    <label for="contact-message">Message</label>
                    <textarea id="contact-message" name="message" rows="4" placeholder="How can we help?" required>{{ old('message') }}</textarea>
                </div>

                <div class="cta-row">
                    <button type="submit" class="btn btn-accent">Send Inquiry</button>
                    <a href="mailto:emmamuelg@yellowquip.com" class="btn btn-secondary">Email Us Instead</a>
                </div>
            </form>

            @php
                $mapLat = '-12.570755588607573';
                $mapLng = '27.880601170653122';
            @endphp
            <div class="contact-map-embed">
                <iframe
                    src="https://www.google.com/maps?q={{ $mapLat }},{{ $mapLng }}&z=16&output=embed"
                    title="Map location of YellowQuip Zambia Limited in Chingola, Copperbelt, Zambia"
                    loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    allowfullscreen>
                </iframe>
            </div>
            <a href="https://www.google.com/maps?q={{ $mapLat }},{{ $mapLng }}"
               target="_blank" rel="noopener noreferrer"
               class="contact-map-link">
                <x-icon name="map-pin" class="icon-sm" /> View larger map &rsaquo;
            </a>

        </div>

    </div>
</section>

@endsection
