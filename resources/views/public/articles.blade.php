@extends('layouts.public')
@section('title', 'Articles — YellowQuip Zambia Limited')
@section('meta_description', "Insights from YellowQuip's operations, planning, safety, training, and equipment service experience.")

@section('content')

<section class="hero-banner articles-hero">
    <div class="home-hero-inner">
        <h1>Articles</h1>
        <p class="hero-subtitle">Insights from YellowQuip's operations, planning, safety, training, and equipment service experience.</p>
        <p class="hero-desc">
            Explore YellowQuip's stories, strategies, and operational insights. These articles highlight the
            company's beginnings, equipment rental practices, ISO-aligned initiatives, planning systems,
            employee motivation, and safety-first culture.
        </p>
    </div>
</section>

<section class="public-section">

    <div class="article-grid">
        @forelse ($articles as $i => $article)
            <article class="article-card">
                <div class="article-card-image">
                    <img src="{{ $article->image_path ? asset('storage/' . $article->image_path) : asset('assets/images/placeholders/placeholder-article.jpg') }}"
                         alt="{{ $article->title }}"
                         loading="lazy"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div class="gallery-placeholder" style="display:none;">
                        <x-icon name="camera" class="icon-lg" />
                    </div>
                </div>
                @if ($article->category)
                    <div class="article-meta">
                        <span class="article-tag">{{ $article->category }}</span>
                    </div>
                @endif
                <h3>{{ $article->title }}</h3>
                <p>{{ $article->excerpt }}</p>

                <button type="button"
                        class="article-read-more article-toggle-btn"
                        data-open-label="Read More"
                        data-close-label="Show Less"
                        aria-expanded="false"
                        aria-controls="article-detail-{{ $i }}">
                    Read More &rsaquo;
                </button>

                <div class="article-full-content" id="article-detail-{{ $i }}">
                    {!! $article->content !!}

                    @if (!empty($article->note))
                        <p class="article-public-note">
                            <strong>{{ $article->category === 'SOP and Safety' ? 'Public Note:' : 'Public Safety Note:' }}</strong>
                            {{ $article->note }}
                        </p>
                    @endif

                    @if ($article->cta_text || $article->cta_label)
                        <div class="article-cta-box">
                            @if ($article->cta_text)
                                <p>{{ $article->cta_text }}</p>
                            @endif
                            @if ($article->cta_label)
                                <a href="{{ $article->cta_url ?: route('public.contact') }}" class="btn btn-accent btn-sm">{{ $article->cta_label }}</a>
                            @endif
                        </div>
                    @endif
                </div>
            </article>
        @empty
            <p class="section-intro">No articles yet — check back soon.</p>
        @endforelse
    </div>

</section>

{{-- Bottom CTA section --}}
<section class="public-section">
    <div class="lease-cta-box">
        <h3>Turn insight into action with YellowQuip.</h3>
        <p>
            From equipment rentals and maintenance to training, planning, and ISO-aligned operations,
            YellowQuip is here to support customers, partners, and project teams with practical expertise.
        </p>
        <div class="cta-row">
            <a href="{{ route('public.contact') }}" class="btn btn-accent btn-lg">Contact Us</a>
            <a href="{{ route('public.services') }}" class="btn btn-outline-light btn-lg">View Services</a>
        </div>
    </div>
</section>

@endsection

@section('scripts')
    <script src="{{ asset('js/article-toggle.js') }}"></script>
@endsection
