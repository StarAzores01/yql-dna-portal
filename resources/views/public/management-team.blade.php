@extends('layouts.public')
@section('title', 'Management Team - Yellowquip Zambia Limited')

@section('content')
<section class="public-section">
    <h2>Management Team</h2>
    <p class="section-intro">Distinguished by their functional and technical qualifications, our management team is built to meet the individual needs of every client.</p>

    <div class="team-grid">
        <div class="team-card">
            <div class="avatar">MD</div>
            <h3>Managing Director</h3>
            <span>+260-96 3319619</span>
        </div>
        <div class="team-card">
            <div class="avatar">BC</div>
            <h3>Business Controller</h3>
            <span>+260-96 1418054</span>
        </div>
        <div class="team-card">
            <div class="avatar">PM</div>
            <h3>Parts Manager</h3>
            <span>+260-96 5123629</span>
        </div>
        <div class="team-card">
            <div class="avatar">OS</div>
            <h3>Oversight</h3>
            <span>+63-915 481 5037</span>
        </div>
    </div>

    <p class="muted" style="margin-top: 24px;">Editor's note: replace the placeholder initials/avatars above with real photos and names from your team once available &mdash; just swap the <code>.avatar</code> div content for an <code>&lt;img&gt;</code> tag.</p>
</section>
@endsection
