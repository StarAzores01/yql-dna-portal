@extends('layouts.public')
@section('title', 'External Links — YellowQuip Zambia Limited')
@section('meta_description', 'A curated list of external resources related to ISO standards, mining safety, heavy equipment, training, and compliance relevant to YellowQuip operations.')

@section('content')

<section class="hero-banner ext-links-hero">
    <div class="home-hero-inner">
        <h1>External <span>Resources</span></h1>
        <p class="hero-desc">
            A curated list of publicly accessible resources covering ISO standards,
            mining safety, heavy equipment, skills training, and industry compliance.
            All links open in a new tab.
        </p>
    </div>
</section>

<section class="public-section">

    {{-- ISO and Compliance Resources --}}
    <div class="ext-link-category">
        <h2 class="ext-link-category-title">ISO and Compliance Resources</h2>
        <p class="section-intro" style="text-align:left; margin:0 0 20px;">
            Reference material for the ISO management system standards that YellowQuip
            operates under.
        </p>
        <div class="ext-link-grid">

            <div class="ext-link-card">
                <div class="ext-link-card-header">
                    <x-icon name="check-circle" class="ext-link-icon" />
                    <h3>ISO 45001 — Occupational Health &amp; Safety</h3>
                </div>
                <p>The international standard for occupational health and safety management systems.</p>
                <a href="https://www.iso.org/iso-45001-occupational-health-and-safety.html"
                   target="_blank" rel="noopener noreferrer" class="ext-link-btn">
                    Visit ISO.org &rsaquo;
                </a>
            </div>

            <div class="ext-link-card">
                <div class="ext-link-card-header">
                    <x-icon name="check-circle" class="ext-link-icon" />
                    <h3>ISO 9001 — Quality Management</h3>
                </div>
                <p>The world's most recognised quality management system standard for consistent service delivery.</p>
                <a href="https://www.iso.org/iso-9001-quality-management.html"
                   target="_blank" rel="noopener noreferrer" class="ext-link-btn">
                    Visit ISO.org &rsaquo;
                </a>
            </div>

            <div class="ext-link-card">
                <div class="ext-link-card-header">
                    <x-icon name="check-circle" class="ext-link-icon" />
                    <h3>ISO 14001 — Environmental Management</h3>
                </div>
                <p>Framework for managing environmental responsibilities in a systematic way.</p>
                <a href="https://www.iso.org/iso-14001-environmental-management.html"
                   target="_blank" rel="noopener noreferrer" class="ext-link-btn">
                    Visit ISO.org &rsaquo;
                </a>
            </div>

            <div class="ext-link-card">
                <div class="ext-link-card-header">
                    <x-icon name="check-circle" class="ext-link-icon" />
                    <h3>ISO 27001 — Information Security</h3>
                </div>
                <p>International standard for information security management systems and data protection.</p>
                <a href="https://www.iso.org/isoiec-27001-information-security.html"
                   target="_blank" rel="noopener noreferrer" class="ext-link-btn">
                    Visit ISO.org &rsaquo;
                </a>
            </div>

            <div class="ext-link-card">
                <div class="ext-link-card-header">
                    <x-icon name="check-circle" class="ext-link-icon" />
                    <h3>ISO 55001 — Asset Management</h3>
                </div>
                <p>Standard for managing physical assets such as heavy equipment fleets over their lifecycle.</p>
                <a href="https://www.iso.org/standard/55089.html"
                   target="_blank" rel="noopener noreferrer" class="ext-link-btn">
                    Visit ISO.org &rsaquo;
                </a>
            </div>

        </div>
    </div>

    {{-- Safety and Workplace Standards --}}
    <div class="ext-link-category">
        <h2 class="ext-link-category-title">Safety and Workplace Standards</h2>
        <p class="section-intro" style="text-align:left; margin:0 0 20px;">
            Regulatory and safety resources relevant to mining and earthmoving operations in Zambia.
        </p>
        <div class="ext-link-grid">

            <div class="ext-link-card">
                <div class="ext-link-card-header">
                    <x-icon name="alert-triangle" class="ext-link-icon" />
                    <h3>Mines Safety Department — Zambia</h3>
                </div>
                <p>Government department responsible for mine safety regulation and inspections in Zambia.</p>
                <a href="https://www.msd.gov.zm"
                   target="_blank" rel="noopener noreferrer" class="ext-link-btn">
                    Visit MSD &rsaquo;
                </a>
            </div>

            <div class="ext-link-card">
                <div class="ext-link-card-header">
                    <x-icon name="alert-triangle" class="ext-link-icon" />
                    <h3>International Labour Organization (ILO) — Safety</h3>
                </div>
                <p>ILO resources on occupational safety and health for the mining and construction sectors.</p>
                <a href="https://www.ilo.org/global/topics/safety-and-health-at-work/lang--en/index.htm"
                   target="_blank" rel="noopener noreferrer" class="ext-link-btn">
                    Visit ILO &rsaquo;
                </a>
            </div>

        </div>
    </div>

    {{-- Environmental Management --}}
    <div class="ext-link-category">
        <h2 class="ext-link-category-title">Environmental Management</h2>
        <p class="section-intro" style="text-align:left; margin:0 0 20px;">
            Environmental regulation and management resources relevant to industrial operations in Zambia.
        </p>
        <div class="ext-link-grid">

            <div class="ext-link-card">
                <div class="ext-link-card-header">
                    <x-icon name="globe" class="ext-link-icon" />
                    <h3>Zambia Environmental Management Agency (ZEMA)</h3>
                </div>
                <p>Zambia's environmental management and regulatory authority for industrial operations.</p>
                <a href="https://www.zema.org.zm"
                   target="_blank" rel="noopener noreferrer" class="ext-link-btn">
                    Visit ZEMA &rsaquo;
                </a>
            </div>

        </div>
    </div>

    {{-- Training and Skills Development Resources --}}
    <div class="ext-link-category">
        <h2 class="ext-link-category-title">Training and Skills Development Resources</h2>
        <p class="section-intro" style="text-align:left; margin:0 0 20px;">
            Resources supporting vocational training, apprenticeships, and skills development
            relevant to YellowQuip's training programmes.
        </p>
        <div class="ext-link-grid">

            <div class="ext-link-card">
                <div class="ext-link-card-header">
                    <x-icon name="book-open" class="ext-link-icon" />
                    <h3>Technical Education, Vocational &amp; Entrepreneurship Training Authority (TEVETA)</h3>
                </div>
                <p>Zambia's authority responsible for technical education and vocational training standards.</p>
                <a href="https://www.teveta.org.zm"
                   target="_blank" rel="noopener noreferrer" class="ext-link-btn">
                    Visit TEVETA &rsaquo;
                </a>
            </div>

            <div class="ext-link-card">
                <div class="ext-link-card-header">
                    <x-icon name="book-open" class="ext-link-icon" />
                    <h3>ILO — Apprenticeship Resources</h3>
                </div>
                <p>International guidance on structuring apprenticeship and on-the-job training programmes.</p>
                <a href="https://www.ilo.org/global/topics/apprenticeships/lang--en/index.htm"
                   target="_blank" rel="noopener noreferrer" class="ext-link-btn">
                    Visit ILO &rsaquo;
                </a>
            </div>

        </div>
    </div>

    {{-- Equipment and Maintenance Resources --}}
    <div class="ext-link-category">
        <h2 class="ext-link-category-title">Equipment and Maintenance Resources</h2>
        <p class="section-intro" style="text-align:left; margin:0 0 20px;">
            OEM and technical reference material for heavy equipment maintenance and repair.
        </p>
        <div class="ext-link-grid">

            <div class="ext-link-card">
                <div class="ext-link-card-header">
                    <x-icon name="tool" class="ext-link-icon" />
                    <h3>Caterpillar — Equipment Reference</h3>
                </div>
                <p>OEM resources and technical references for Caterpillar heavy equipment used in mining and construction.</p>
                <a href="https://www.cat.com"
                   target="_blank" rel="noopener noreferrer" class="ext-link-btn">
                    Visit CAT &rsaquo;
                </a>
            </div>

            <div class="ext-link-card">
                <div class="ext-link-card-header">
                    <x-icon name="tool" class="ext-link-icon" />
                    <h3>Komatsu — Equipment Reference</h3>
                </div>
                <p>OEM references for Komatsu heavy machinery including excavators, bulldozers, and motor graders.</p>
                <a href="https://www.komatsu.com"
                   target="_blank" rel="noopener noreferrer" class="ext-link-btn">
                    Visit Komatsu &rsaquo;
                </a>
            </div>

        </div>
    </div>

    {{-- Mining and Construction Industry References --}}
    <div class="ext-link-category">
        <h2 class="ext-link-category-title">Mining and Construction Industry References</h2>
        <p class="section-intro" style="text-align:left; margin:0 0 20px;">
            General industry reference material for heavy equipment, mining, and construction.
        </p>
        <div class="ext-link-grid">

            <div class="ext-link-card">
                <div class="ext-link-card-header">
                    <x-icon name="alert-triangle" class="ext-link-icon" />
                    <h3>Zambia Chamber of Mines</h3>
                </div>
                <p>Industry body representing mining companies and related service providers in Zambia.</p>
                <a href="https://www.zambiamining.co.zm"
                   target="_blank" rel="noopener noreferrer" class="ext-link-btn">
                    Visit ZCM &rsaquo;
                </a>
            </div>

        </div>
    </div>

    <p class="muted" style="margin-top: 16px; font-size: 12px;">
        All external links open in a new tab. YellowQuip is not responsible for the content
        of external websites. Links are provided for reference only.
    </p>

</section>

@endsection
