@extends('layouts.public')
@section('title', 'Project Gallery - Yellowquip Zambia Limited')

@section('content')
<section class="public-section">
    <h2>Project Gallery</h2>
    <p class="section-intro">A showcase of completed work, public project images, and non-confidential proof of Yellowquip's service delivery. We are ISO 45001, 27001, 14001, 9001 and 55001 compliant &mdash; customer satisfaction is our strength.</p>

    <div class="gallery-grid" style="margin-top: 20px;">
        {{-- Replace with real public-safe images, e.g.: <img src="{{ asset('images/project-gallery/job-1.jpg') }}" alt="..."> --}}
        <div class="info-card" style="height:160px; display:flex; align-items:center; justify-content:center;">Image placeholder</div>
        <div class="info-card" style="height:160px; display:flex; align-items:center; justify-content:center;">Image placeholder</div>
        <div class="info-card" style="height:160px; display:flex; align-items:center; justify-content:center;">Image placeholder</div>
    </div>

    <p class="muted" style="margin-top: 24px;">This gallery only ever shows public-safe project photos. Internal deliverable documents, client reports, RFQs, contracts, and inspection reports stay in the private document repository and are never linked from here.</p>
</section>
@endsection
