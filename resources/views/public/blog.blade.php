@extends('layouts.public')
@section('title', 'Blog — YellowQuip Zambia Limited')
@section('meta_description', "Updates, practical notes, and public insights from YellowQuip on safety culture, rental operations, ISO-aligned systems, and the YQL DNA platform.")

@section('content')

<section class="hero-banner blog-hero">
    <div class="home-hero-inner">
        <h1>Blog</h1>
        <p class="hero-subtitle">Updates, practical notes, and public insights from YellowQuip.</p>
        <p class="hero-desc">
            Read short updates and practical insights about YellowQuip's safety culture, rental operations,
            ISO-aligned systems, planning practices, and YQL DNA platform.
        </p>
    </div>
</section>

<section class="public-section">

    <div class="blog-list">
        @forelse ($posts as $post)
            <article class="blog-post-card">
                <div class="blog-card-image">
                    <img src="{{ $post->image_path ? asset('storage/' . $post->image_path) : asset('assets/images/placeholders/placeholder-blog.jpg') }}"
                         alt="{{ $post->title }}"
                         loading="lazy"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div class="gallery-placeholder" style="display:none;">
                        <x-icon name="camera" class="icon-lg" />
                    </div>
                </div>
                <h3>{{ $post->title }}</h3>
                <p>{{ $post->excerpt }}</p>

                @if (!empty($post->note))
                    <p class="article-public-note"><strong>Public Note:</strong> {{ $post->note }}</p>
                @endif

                @if ($post->cta_text || $post->cta_label)
                    <div class="article-cta-box">
                        @if ($post->cta_text)
                            <p>{{ $post->cta_text }}</p>
                        @endif
                        @if ($post->cta_label)
                            <a href="{{ $post->cta_url ?: route('public.contact') }}" class="btn btn-accent btn-sm">{{ $post->cta_label }}</a>
                        @endif
                    </div>
                @endif
            </article>
        @empty
            <p class="section-intro">No blog posts yet — check back soon.</p>
        @endforelse
    </div>

</section>

{{-- Bottom CTA section --}}
<section class="public-section">
    <div class="lease-cta-box">
        <h3>Ready to work with YellowQuip?</h3>
        <p>
            Whether you need reliable equipment rentals, maintenance support, operator training,
            ISO-aligned operational guidance, or partnership opportunities, the YellowQuip team
            is ready to assist.
        </p>
        <div class="cta-row">
            <a href="{{ route('public.contact') }}" class="btn btn-accent btn-lg">Contact Us</a>
            <a href="{{ route('public.services') }}" class="btn btn-outline-light btn-lg">Explore Services</a>
        </div>
    </div>
</section>

@endsection
