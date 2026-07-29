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
                    @php
                        $hasOverview = $link->headquarters || $link->employee_count || $link->main_products || $link->industry || $link->country || $link->website_url;
                        $hasOwnership = $link->controlling_shareholder || $link->ultimate_controller || $link->company_nature;
                        $hasGovernance = $link->chairman || $link->ceo || $link->key_directors || $link->governance_notes;
                        $hasFullProfile = $hasOverview || $hasOwnership || $hasGovernance || $link->content;
                        $visitUrl = $link->primaryUrl();
                    @endphp
                    <div class="ext-link-card">

                        {{-- Card header: icon + title --}}
                        <div class="ext-link-card-header">
                            @if($link->logo_path)
                                <img src="{{ asset('storage/' . $link->logo_path) }}"
                                     alt="{{ $link->displayName() }} logo"
                                     class="ext-link-logo">
                            @else
                                <x-icon name="{{ $link->icon }}" class="ext-link-icon" />
                            @endif
                            <h3>{{ $link->displayName() }}</h3>
                        </div>

                        {{-- Short description --}}
                        @if($link->excerpt)
                            <p>{{ $link->excerpt }}</p>
                        @endif

                        {{-- Full description — longer intro paragraph --}}
                        @if($link->full_description)
                            <p>{{ $link->full_description }}</p>
                        @endif

                        {{-- Highlighted note (e.g. ownership / governance callout) --}}
                        @if($link->note)
                            <p class="article-note" style="margin-top:8px;">{{ $link->note }}</p>
                        @endif

                        {{-- Structured company profile (collapsible) --}}
                        @if($hasFullProfile)
                            <details class="ext-link-details" style="margin-top:10px;">
                                <summary style="cursor:pointer;font-size:.9rem;color:var(--accent,#b8860b);font-weight:600;">
                                    View full overview ▾
                                </summary>
                                <div class="rich-content" style="margin-top:10px;font-size:.9rem;">

                                    @if($hasOverview)
                                        <div class="ext-link-fact-block">
                                            <h4 class="ext-link-fact-title">Company Overview</h4>
                                            <ul class="ext-link-fact-list">
                                                @if($link->headquarters)<li><strong>Headquarters:</strong> {{ $link->headquarters }}</li>@endif
                                                @if($link->employee_count)<li><strong>Employees:</strong> {{ $link->employee_count }}</li>@endif
                                                @if($link->main_products)<li><strong>Main Products:</strong> {{ $link->main_products }}</li>@endif
                                                @if($link->industry)<li><strong>Industry:</strong> {{ $link->industry }}</li>@endif
                                                @if($link->country)<li><strong>Country:</strong> {{ $link->country }}</li>@endif
                                                @if($link->website_url)<li><strong>Website:</strong> {{ $link->website_url }}</li>@endif
                                            </ul>
                                        </div>
                                    @endif

                                    @if($hasOwnership)
                                        <div class="ext-link-fact-block">
                                            <h4 class="ext-link-fact-title">Ownership &amp; Control</h4>
                                            <ul class="ext-link-fact-list">
                                                @if($link->controlling_shareholder)
                                                    <li><strong>Controlling Shareholder:</strong> {{ $link->controlling_shareholder }}{{ $link->controlling_shareholder_percentage ? ' (' . $link->controlling_shareholder_percentage . ')' : '' }}</li>
                                                @endif
                                                @if($link->ultimate_controller)
                                                    <li><strong>Ultimate Controller:</strong> {{ $link->ultimate_controller }}{{ $link->ultimate_controller_percentage ? ' (' . $link->ultimate_controller_percentage . ')' : '' }}</li>
                                                @endif
                                                @if($link->company_nature)<li><strong>Nature:</strong> {{ $link->company_nature }}</li>@endif
                                            </ul>
                                        </div>
                                    @endif

                                    @if($hasGovernance)
                                        <div class="ext-link-fact-block">
                                            <h4 class="ext-link-fact-title">Governance Structure</h4>
                                            @if($link->governance_notes)
                                                <p>{{ $link->governance_notes }}</p>
                                            @endif
                                            <ul class="ext-link-fact-list">
                                                @if($link->chairman)<li><strong>Chairman:</strong> {{ $link->chairman }}</li>@endif
                                                @if($link->ceo)<li><strong>CEO:</strong> {{ $link->ceo }}</li>@endif
                                                @if($link->key_directors)<li><strong>Key Directors:</strong> {{ $link->key_directors }}</li>@endif
                                            </ul>
                                        </div>
                                    @endif

                                    @if($link->content)
                                        {!! $link->content !!}
                                    @endif
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
                        @if($visitUrl)
                            <a href="{{ $visitUrl }}"
                               target="_blank" rel="noopener noreferrer" class="ext-link-btn">
                                {{ $link->link_label ?: 'Visit Site' }} &rsaquo;
                            </a>
                        @endif

                    </div>
                @endforeach
            </div>
        </div>
    @empty
        <p class="muted">No external links are available at the moment.</p>
    @endforelse

    <p class="muted" style="margin-top:24px; font-size:12px;">
        All external links open in a new tab. YellowQuip is not responsible for the content
        of external websites. Links are provided for reference only.
    </p>

</section>

@endsection
