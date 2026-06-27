@extends('layouts.public')
@section('title', 'Articles - Yellowquip Zambia Limited')

@section('content')
<section class="public-section">
    <h2>Articles</h2>
    <p class="section-intro">Insights from the YellowQuip team on equipment, training, and running a rental business.</p>
    <div class="card-grid">
        <a href="{{ route('public.blog') }}" class="info-card" style="text-decoration:none; display:block;">
            <h3>KMP &mdash; YQL Planning Section</h3>
            <p>How our planning section keeps fleet and projects aligned.</p>
        </a>
        <a href="{{ route('public.blog') }}" class="info-card" style="text-decoration:none; display:block;">
            <h3>ISO Implementations</h3>
            <p>How we roll out ISO 45001, 9001, 14001, 27001 and 55001 across operations.</p>
        </a>
        <a href="{{ route('public.blog') }}" class="info-card" style="text-decoration:none; display:block;">
            <h3>How YellowQuip Runs Its Equipment Rental Company</h3>
            <p>Five pillars: Safety First, Service That Sticks, Smart Fleet, People Powered, and growth.</p>
        </a>
    </div>
</section>
@endsection
