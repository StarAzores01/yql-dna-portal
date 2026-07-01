@extends('layouts.public')
@section('title', 'Management Team — YellowQuip Zambia Limited')
@section('meta_description', 'Meet the YellowQuip Zambia Limited team leading operations, finance, maintenance, training, safety, projects, and service delivery.')

@section('content')

<section class="public-section management-section-top">

    <h2>Management Team</h2>
    <h3 class="section-subtitle">United in Purpose, Driven by Performance.</h3>
    <p class="section-intro">
        Meet the YellowQuip team leading operations, finance, maintenance, training, safety,
        projects, and service delivery. Each member contributes to the company's commitment
        to reliable performance, customer satisfaction, safety, and continuous improvement.
    </p>

    <div class="team-grid mgmt-grid">
        @foreach ($team as $member)
            <div class="team-card mgmt-card">
                <div class="mgmt-photo-wrap">
                    <img src="{{ $member->photo_path ? asset('storage/' . $member->photo_path) : asset('assets/images/placeholders/placeholder-article.jpg') }}"
                         alt="{{ $member->name }} — {{ $member->position }}, YellowQuip Zambia Limited"
                         class="mgmt-photo"
                         loading="lazy"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div class="avatar avatar-fallback">{{ $member->initials }}</div>
                </div>
                <div class="mgmt-card-body">
                    <h3>{{ $member->name }}</h3>
                    <p class="mgmt-role">{{ $member->position }}</p>
                    <p class="mgmt-desc">{{ $member->bio }}</p>
                </div>
            </div>
        @endforeach
    </div>

    {{-- General contact note — no personal contact numbers shown here; see Contact Us page --}}
    <div class="mgmt-footer-note">
        <p>
            To reach the YellowQuip team for equipment inquiries, rental arrangements,
            or service requests, visit our
            <a href="{{ route('public.contact') }}">Contact Us</a> page.
        </p>
    </div>

</section>

@endsection
