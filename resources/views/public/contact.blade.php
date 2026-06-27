@extends('layouts.public')
@section('title', 'Contact Us - Yellowquip Zambia Limited')

@section('content')
<section class="public-section">
    <h2>Contact Us</h2>
    <p class="section-intro">Get in direct touch with the YellowQuip team &mdash; equipment rentals, maintenance services, or ISO-aligned solutions.</p>

    <div class="contact-grid">
        <div>
            <div class="contact-detail"><strong>Address</strong>6058 Kasompe Road, Chingola South, Copperbelt, Zambia</div>
            <div class="contact-detail"><strong>Managing Director</strong>+260-96 3319619</div>
            <div class="contact-detail"><strong>Business Controller</strong>+260-96 1418054</div>
            <div class="contact-detail"><strong>Parts Manager</strong>+260-96 5123629</div>
            <div class="contact-detail"><strong>Oversight</strong>+63-915 481 5037</div>
            <div class="contact-detail"><strong>Email</strong>emmamuelg@yellowquip.com</div>
        </div>
        <div>
            <p class="muted">Want a contact form here instead of static details? That needs a small <code>ContactController</code> + mail config &mdash; let me know and I'll add it as its own additive piece.</p>
        </div>
    </div>
</section>
@endsection
