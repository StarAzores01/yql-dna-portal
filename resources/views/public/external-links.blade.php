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

                        {{-- Card header: icon + title --}}
                        <div class="ext-link-card-header">
                            @if($link->logo_path)
                                <img src="{{ asset('storage/' . $link->logo_path) }}"
                                     alt="{{ $link->title }} logo"
                                     class="ext-link-logo">
                            @else
                                <x-icon name="{{ $link->icon }}" class="ext-link-icon" />
                            @endif
                            <h3>{{ $link->title }}</h3>
                        </div>

                        {{-- Excerpt / short description --}}
                        @if($link->excerpt)
                            <p>{{ $link->excerpt }}</p>
                        @endif

                        {{-- Highlighted note (e.g. ownership / governance callout) --}}
                        @if($link->note)
                            <p class="article-note" style="margin-top:8px;">{{ $link->note }}</p>
                        @endif

                        {{-- Rich text overview (collapsible if present) --}}
                        @if($link->content)
                            <details class="ext-link-details" style="margin-top:10px;">
                                <summary style="cursor:pointer;font-size:.9rem;color:var(--accent,#b8860b);font-weight:600;">
                                    View full overview ▾
                                </summary>
                                <div class="rich-content" style="margin-top:10px;font-size:.9rem;">
                                    {!! $link->content !!}
                                </div>
                            </details>
                        @endif

                        {{-- Topics / tags --}}
                        @if($link->topics)
                            <div class="topic-chips" style="margin-top:10px;">
                                @foreach($link->topicsList() as $topic)
                                    <span class="topic-chip">{{ $topic }}</span>
                                @endforeach
                            </div>
                        @endif

                        {{-- Visit button --}}
                        <a href="{{ $link->url }}"
                           target="_blank" rel="noopener noreferrer" class="ext-link-btn">
                            {{ $link->link_label ?: 'Visit Site' }} &rsaquo;
                        </a>

                    </div>
                @endforeach
            </div>
        </div>
    @empty
        <p class="muted">No external resources have been added yet.</p>
    @endforelse

    <p class="muted" style="margin-top:24px; font-size:12px;">
        All external links open in a new tab. YellowQuip is not responsible for the content
        of external websites. Links are provided for reference only.
    </p>

</section>

@endsection
