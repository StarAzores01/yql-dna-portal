@extends('layouts.public')
@section('title', 'Project Gallery — YellowQuip Zambia Limited')
@section('meta_description', "Public showcase of YellowQuip's heavy equipment maintenance, parts supply, earthmoving works, and training programs across the Copperbelt, Zambia.")

@section('content')

@php
    $filters = collect(['all' => 'All'])->merge(config('gallery_categories'));
@endphp

{{-- Page header --}}
<section class="hero-banner gallery-hero">
    <div class="home-hero-inner">
        <h1>{!! $content['hero_heading'] ?? 'Project <span>Gallery</span>' !!}</h1>
        <p class="hero-desc">
            {{ $content['hero_desc'] ?? 'Tools You Trust, Rentals You Rely On. YellowQuip is ISO 45001, ISO 27001, ISO 14001, ISO 9001, and ISO 55001 compliant. Customer satisfaction is our strength, and we aim to meet customer demands and go beyond expectations.' }}
        </p>
    </div>
</section>

{{-- Filter buttons --}}
<section class="public-section gallery-filter-section">
    <div class="gallery-filter-bar" role="group" aria-label="Filter gallery by category">
        @foreach ($filters as $slug => $label)
            <button type="button"
                    class="gallery-filter-btn {{ $slug === 'all' ? 'active' : '' }}"
                    data-filter="{{ $slug }}">
                {{ $label }}
            </button>
        @endforeach
    </div>

    {{-- Gallery grid --}}
    <div class="gallery-grid project-gallery-grid">
        @forelse ($items as $item)
            <figure class="project-gallery-item" data-category="{{ $item->category }}" data-topics="{{ $item->topics }}">
                <div class="gallery-item">
                    <img src="{{ $item->image_path ? asset('storage/' . $item->image_path) : asset('assets/images/placeholders/placeholder-article.jpg') }}"
                         alt="{{ $item->description ?? $item->title }}"
                         loading="lazy"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div class="gallery-placeholder" style="display:none;">
                        <x-icon name="camera" class="icon-lg" />
                        <p>{{ $item->title }}</p>
                    </div>
                </div>
                <figcaption class="gallery-item-caption">
                    <span class="gallery-item-category">{{ $item->categoryLabel() }}</span>
                    <strong class="gallery-item-title">{{ $item->title }}</strong>
                    <span class="gallery-item-desc">{{ $item->description }}</span>
                    @if ($item->topicsList())
                        <div class="topic-tags">
                            @foreach ($item->topicsList() as $topic)
                                <span class="topic-tag">{{ $topic }}</span>
                            @endforeach
                        </div>
                    @endif
                </figcaption>
            </figure>
        @empty
            <p class="section-intro">No gallery items yet — check back soon.</p>
        @endforelse
    </div>

    <p class="muted" style="margin-top: 24px; text-align:center; font-size: 12px;">
        This page shows only public-safe images. Internal documents, SOP manuals, audit
        records, client files, contracts, RFQs, and private repository links are never
        published here.
    </p>
</section>

@endsection

@section('scripts')
    <script src="{{ asset('js/gallery-filter.js') }}"></script>
@endsection
