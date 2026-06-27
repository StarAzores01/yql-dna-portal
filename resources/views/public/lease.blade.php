@extends('layouts.public')
@section('title', 'Lease - Yellowquip Zambia Limited')

@section('content')
<section class="public-section">
    <h2>Equipment Lease &amp; Rental</h2>
    <p class="section-intro">Rental rates are listed monthly and yearly across our full equipment range, with tiered packages to fit your project scope.</p>

    <div class="card-grid">
        <div class="info-card"><h3>Basic</h3><p>Entry-level access to core machine categories at standard monthly rates.</p></div>
        <div class="info-card"><h3>Standard</h3><p>Extended fleet access with priority scheduling and maintenance support included.</p></div>
        <div class="info-card"><h3>Premium</h3><p>Full fleet priority, dedicated operator support, and flexible yearly contract terms.</p></div>
    </div>

    <p style="margin-top: 28px;">Equipment available for lease includes excavators, bulldozers, motor graders, wheel loaders, and hydraulic rock breakers. <a href="{{ route('public.contact') }}">Contact us</a> for current availability and a tailored quote.</p>
</section>
@endsection
