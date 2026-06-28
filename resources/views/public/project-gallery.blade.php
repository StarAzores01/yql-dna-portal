@extends('layouts.public')
@section('title', 'Project Gallery — Yellowquip Zambia Limited')
@section('meta_description', "Public showcase of Yellowquip's heavy equipment maintenance, parts supply, earthmoving works, and training programs across the Copperbelt, Zambia.")

@section('content')

@php
    $filters = [
        ['slug' => 'all', 'label' => 'All'],
        ['slug' => 'heavy-equipment-maintenance', 'label' => 'Heavy Equipment Maintenance'],
        ['slug' => 'parts-mining-equipment-supplier', 'label' => 'Parts and Mining Equipment Supplier'],
        ['slug' => 'earthmoving-mining-jobs', 'label' => 'Earthmoving and Mining-Related Jobs'],
        ['slug' => 'apprenticeship-training', 'label' => 'Apprenticeship Training Program'],
        ['slug' => 'operators-training', 'label' => 'Operators Training'],
        ['slug' => 'artisan-training', 'label' => 'Artisan Training Program'],
        ['slug' => 'repair-service-overhaul', 'label' => 'Rehabilitate, Repair, Service and Overhaul Components'],
    ];

    $items = [
        [
            'category' => 'heavy-equipment-maintenance',
            'categoryLabel' => 'Heavy Equipment Maintenance',
            'title' => 'Equipment Maintenance Work',
            'desc' => 'Public showcase of Yellowquip equipment maintenance and service support.',
            'image' => 'maintenance/gallery-heavy-equipment-maintenance-01.png',
        ],
        [
            'category' => 'heavy-equipment-maintenance',
            'categoryLabel' => 'Heavy Equipment Maintenance',
            'title' => 'Scheduled Servicing',
            'desc' => 'Technicians performing scheduled servicing on heavy equipment components.',
            'image' => 'maintenance/gallery-heavy-equipment-maintenance-02.png',
        ],
        [
            'category' => 'parts-mining-equipment-supplier',
            'categoryLabel' => 'Parts and Mining Equipment Supplier',
            'title' => 'Parts Supply Operations',
            'desc' => 'Genuine parts and mining equipment supply for underground and open-pit operations.',
            'image' => 'equipment/gallery-parts-mining-equipment-01.png',
        ],
        [
            'category' => 'parts-mining-equipment-supplier',
            'categoryLabel' => 'Parts and Mining Equipment Supplier',
            'title' => 'Equipment Supply',
            'desc' => 'Genuine equipment supply supporting mining and construction operations.',
            'image' => 'equipment/gallery-equipment-supply-01.png',
        ],
        [
            'category' => 'parts-mining-equipment-supplier',
            'categoryLabel' => 'Parts and Mining Equipment Supplier',
            'title' => 'Open-Pit Mining Equipment',
            'desc' => 'Equipment supply and support for open-pit mining operations.',
            'image' => 'equipment/gallery-mining-equipment-openpit-01.png',
        ],
        [
            'category' => 'parts-mining-equipment-supplier',
            'categoryLabel' => 'Parts and Mining Equipment Supplier',
            'title' => 'Underground Mining Equipment',
            'desc' => 'Equipment supply and support for underground mining operations.',
            'image' => 'equipment/gallery-mining-equipment-underground-01.png',
        ],
        [
            'category' => 'earthmoving-mining-jobs',
            'categoryLabel' => 'Earthmoving and Mining-Related Jobs',
            'title' => 'Earthmoving Operations',
            'desc' => 'Trained teams delivering earthmoving and mining-related works on active sites.',
            'image' => 'field/gallery-earthmoving-mining-jobs-01.jpg',
        ],
        [
            'category' => 'earthmoving-mining-jobs',
            'categoryLabel' => 'Earthmoving and Mining-Related Jobs',
            'title' => 'Field Operation',
            'desc' => 'Yellowquip crews delivering practical site support on active project sites.',
            'image' => 'field/gallery-field-operation-01.jpg',
        ],
        [
            'category' => 'earthmoving-mining-jobs',
            'categoryLabel' => 'Earthmoving and Mining-Related Jobs',
            'title' => 'Site Work',
            'desc' => 'On-site earthmoving and mining-related work delivered by trained crews.',
            'image' => 'field/gallery-site-work-01.jpg',
        ],
        [
            'category' => 'apprenticeship-training',
            'categoryLabel' => 'Apprenticeship Training Program',
            'title' => 'Apprenticeship Training Activity',
            'desc' => 'Hands-on apprenticeship training developing the next generation of technicians.',
            'image' => 'apprenticeship/gallery-apprenticeship-training-01.jpg',
        ],
        [
            'category' => 'apprenticeship-training',
            'categoryLabel' => 'Apprenticeship Training Program',
            'title' => 'Apprenticeship Training Activity',
            'desc' => 'Continued hands-on apprenticeship training developing technical skills.',
            'image' => 'apprenticeship/gallery-apprenticeship-training-02.jpg',
        ],
        [
            'category' => 'operators-training',
            'categoryLabel' => 'Operators Training',
            'title' => 'Operator Training Activity',
            'desc' => 'Training activity focused on safe and effective heavy equipment operation.',
            'image' => 'operators/gallery-operators-training-01.jpg',
        ],
        [
            'category' => 'operators-training',
            'categoryLabel' => 'Operators Training',
            'title' => 'Operator Training Session',
            'desc' => 'Operators building proficiency across heavy equipment classes.',
            'image' => 'operators/gallery-operators-training-02.jpg',
        ],
        [
            'category' => 'operators-training',
            'categoryLabel' => 'Operators Training',
            'title' => 'Heavy Equipment Operator Training',
            'desc' => 'Practical heavy equipment operator training focused on safe handling.',
            'image' => 'operators/gallery-heavy-equipment-operator-training-01.jpg',
        ],
        [
            'category' => 'artisan-training',
            'categoryLabel' => 'Artisan Training Program',
            'title' => 'Artisan Skills Development',
            'desc' => 'Hands-on artisan training aligned with technical work and equipment servicing needs.',
            'image' => 'artisan/gallery-artisan-training-01.jpg',
        ],
        [
            'category' => 'artisan-training',
            'categoryLabel' => 'Artisan Training Program',
            'title' => 'Artisan Skills Development',
            'desc' => 'Continued artisan training in support of equipment servicing and repair.',
            'image' => 'artisan/gallery-artisan-training-02.jpg',
        ],
        [
            'category' => 'repair-service-overhaul',
            'categoryLabel' => 'Rehabilitate, Repair, Service and Overhaul Components',
            'title' => 'Component Overhaul',
            'desc' => 'Rehabilitation, repair, servicing, and overhaul of heavy equipment components.',
            'image' => 'maintenance/gallery-repair-service-overhaul-01.png',
        ],
        [
            'category' => 'repair-service-overhaul',
            'categoryLabel' => 'Rehabilitate, Repair, Service and Overhaul Components',
            'title' => 'Component Overhaul',
            'desc' => 'Overhaul of heavy equipment components to restore operational condition.',
            'image' => 'maintenance/gallery-component-overhaul-01.png',
        ],
        [
            'category' => 'repair-service-overhaul',
            'categoryLabel' => 'Rehabilitate, Repair, Service and Overhaul Components',
            'title' => 'Completed Works',
            'desc' => "A finished service outcome from Yellowquip's equipment maintenance and repair work.",
            'image' => 'completed/gallery-completed-work-01.jpg',
        ],
    ];
@endphp

{{-- Page header --}}
<section class="hero-banner gallery-hero">
    <div class="home-hero-inner">
        <h1>Project <span>Gallery</span></h1>
        <p class="hero-desc">
            Tools You Trust, Rentals You Rely On. Yellowquip is ISO 45001, ISO 27001,
            ISO 14001, ISO 9001, and ISO 55001 compliant. Customer satisfaction is our
            strength, and we aim to meet customer demands and go beyond expectations.
        </p>
    </div>
</section>

{{-- Filter buttons --}}
<section class="public-section gallery-filter-section">
    <div class="gallery-filter-bar" role="group" aria-label="Filter gallery by category">
        @foreach ($filters as $filter)
            <button type="button"
                    class="gallery-filter-btn {{ $filter['slug'] === 'all' ? 'active' : '' }}"
                    data-filter="{{ $filter['slug'] }}">
                {{ $filter['label'] }}
            </button>
        @endforeach
    </div>

    {{-- Gallery grid --}}
    <div class="gallery-grid project-gallery-grid">
        @foreach ($items as $item)
            <figure class="project-gallery-item" data-category="{{ $item['category'] }}">
                <div class="gallery-item">
                    <img src="{{ asset('assets/images/gallery/' . $item['image']) }}"
                         alt="{{ $item['desc'] }}"
                         loading="lazy"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div class="gallery-placeholder" style="display:none;">
                        <x-icon name="camera" class="icon-lg" />
                        <p>{{ $item['title'] }}</p>
                        <small>{{ $item['image'] }}</small>
                    </div>
                </div>
                <figcaption class="gallery-item-caption">
                    <span class="gallery-item-category">{{ $item['categoryLabel'] }}</span>
                    <strong class="gallery-item-title">{{ $item['title'] }}</strong>
                    <span class="gallery-item-desc">{{ $item['desc'] }}</span>
                </figcaption>
            </figure>
        @endforeach
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
