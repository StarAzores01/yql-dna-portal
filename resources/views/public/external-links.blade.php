@extends('layouts.public')
@section('title', 'External Links — YellowQuip Zambia Limited')
@section('meta_description', 'A curated list of external resources related to ISO standards, mining safety, heavy equipment, training, and compliance relevant to YellowQuip operations.')

@section('content')

<section class="hero-banner ext-links-hero">
    <div class="home-hero-inner">
        <h1>{!! $content['hero_heading'] ?? 'External <span>Resources</span>' !!}</h1>
        <p class="hero-desc">
            {{ $content['hero_desc'] ?? 'A curated list of publicly accessible resources covering ISO standards, mining safety, heavy equipment, skills training, and industry compliance. All links open in a new tab.' }}
        </p>
    </div>
</section>

<section class="public-section">

    @forelse($links as $category => $categoryLinks)
        <div class="ext-link-category">
            <h2 class="ext-link-category-title">{{ $category }}</h2>
            <div class="ext-link-grid">
                @foreach($categoryLinks as $link)
                    <div class="ext-link-card">
                        <div class="ext-link-card-header">
                            <x-icon name="{{ $link->icon }}" class="ext-link-icon" />
                            <h3>{{ $link->title }}</h3>
                        </div>
                        @if($link->description)
                            <p>{{ $link->description }}</p>
                        @endif
                        <a href="{{ $link->url }}"
                           target="_blank" rel="noopener noreferrer" class="ext-link-btn">
                            Visit Site &rsaquo;
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @empty
        <p class="muted">No external links have been added yet.</p>
    @endforelse

    <p class="muted" style="margin-top: 16px; font-size: 12px;">
        All external links open in a new tab. YellowQuip is not responsible for the content
        of external websites. Links are provided for reference only.
    </p>

</section>

@endsection
