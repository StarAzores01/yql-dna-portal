@extends('layouts.public')
@section('title', 'Articles — Yellowquip Zambia Limited')
@section('meta_description', "Insights from Yellowquip's operations, planning, safety, training, and equipment service experience.")

@section('content')

@php
    $articles = [
        [
            'title' => 'Yellowquip — Est. 2008: Looking Back Where We Started',
            'category' => 'Company Story',
            'image' => 'article-yellowquip-est-2008.jpg',
            'excerpt' => "Every great journey begins with a single bold step — and Yellowquip's journey began with a small team, a modest fleet, and a clear promise to deliver dependable equipment and honest service. From the early workshop days to serving Zambia's mining, industrial, and construction needs, Yellowquip's story is built on resilience, trust, and customer-focused service.",
            'content' => [
                "Looking back at the beginnings of Yellowquip Zambia Limited means remembering the early days when the company was more than a name — it was a promise. Yellowquip began with a modest fleet, a handful of dedicated team members, and a vision that was bigger than its available resources.",
                "The workshop was humble, but it carried the sound of ambition. Every machine deployed represented more than horsepower; it represented growth, impact, and the belief that reliable equipment could help move industries forward.",
                "Clients came one by one, drawn by Yellowquip's commitment to quality, dependability, and service. The company did not simply rent out equipment; it built relationships, solved operational problems, and earned trust through consistent performance.",
                "Those early years shaped Yellowquip's values: integrity, reliability, service, and innovation. They laid the foundation for the company's present work in equipment rental, maintenance, parts support, training, and ISO-aligned operations.",
                "Yellowquip remains proudly rooted in its mission: to deliver high-quality customer service proactively and with value pricing, while building successful partnerships with customers, employees, shareholders, and suppliers.",
            ],
            'ctaText' => 'Looking for a reliable equipment and service partner?',
            'ctaButton' => 'Work With Yellowquip',
            'ctaRoute' => 'public.contact',
        ],
        [
            'title' => 'Revenue-Boosting Ideas for Yellowquip Equipment Rentals',
            'category' => 'Rental Strategy',
            'image' => 'article-revenue-boosting-rentals.jpg',
            'excerpt' => 'Equipment rental growth is not only about booking more machines. It is also about improving utilization, pricing, reliability, customer experience, maintenance planning, and add-on services that create more value from every hire.',
            'content' => [
                'Boosting rental revenue requires more than increasing the number of bookings. For an equipment rental company like Yellowquip, revenue growth comes from maximizing the value of every machine, every service, and every customer relationship.',
                'One key strategy is maximizing asset utilization. Rental patterns should be monitored to identify underused equipment, high-demand units, and machines that may need to be rotated, repurposed, or retired. A well-utilized fleet generates stronger returns and avoids idle asset costs.',
                'Smart pricing also plays an important role. Rates can be structured based on rental duration, equipment category, urgency, customer type, season, and level of support required. Bundled packages such as equipment plus operator support, fuel, or priority maintenance can help increase revenue while giving customers clearer value.',
                'Clear agreements and deposits protect the company and the customer. Digital contracts, defined terms, damage policies, late return rules, and proper documentation help reduce disputes and improve accountability.',
                "Preventive maintenance supports revenue by reducing downtime. Reliable machines increase customer satisfaction, protect the company's reputation, and justify stronger pricing. Maintenance logs also help demonstrate the value of Yellowquip's service standards.",
                'Rental management software can further support bookings, inventory, billing, maintenance, and performance reports. With centralized information, the company can avoid double bookings, track machine status, and improve decision-making.',
                'Finally, Yellowquip can expand revenue through accessories, safety gear, fuel kits, operator services, weekend specials, training workshops, certifications, and sub-rental partnerships.',
            ],
            'ctaText' => 'Need equipment rental support tailored to your project?',
            'ctaButton' => 'Request a Service Inquiry',
            'ctaRoute' => 'public.contact',
        ],
        [
            'title' => 'KMP — YQL Planning Section',
            'category' => 'Planning and Operations',
            'image' => 'article-yql-planning-section.jpg',
            'excerpt' => 'The YQL Planning Section supports maintenance scheduling, work order control, resource allocation, equipment monitoring, documentation, compliance, and cross-site coordination.',
            'content' => [
                'The YQL Planning Section plays a central role in heavy equipment maintenance and operations. Its purpose is to keep operations organized, reduce downtime, manage resources, and ensure that work is completed safely and efficiently.',
                'Planning begins with maintenance scheduling. The planning team develops preventive, predictive, and corrective maintenance schedules to minimize unexpected breakdowns and improve equipment reliability.',
                'Work order management is another important responsibility. Planners create, prioritize, track, and close work orders so that maintenance tasks are completed on time and properly documented.',
                'The planning section also handles resource allocation. This includes planning manpower, tools, spare parts, materials, and equipment requirements before work begins. This helps avoid bottlenecks, delays, and unnecessary costs.',
                'Equipment monitoring supports better decision-making. By reviewing equipment performance data, the planning team can identify trends, predict possible failures, and schedule maintenance before major issues occur.',
                'Documentation is essential for compliance and future reference. Maintenance records, equipment history, spare parts inventory, inspection reports, and work order logs all support audit readiness and operational transparency.',
                'The YQL Planning function also strengthens coordination between operations, procurement, maintenance, and management. Through proper communication, teams can align schedules, reduce risk, and improve productivity.',
                "The section's goal is to develop structured schedules, reduce unplanned downtime, ensure resource availability, minimize costs, enforce safety standards, and improve operational efficiency.",
            ],
            'ctaText' => 'Want to coordinate equipment support or planning services with Yellowquip?',
            'ctaButton' => 'Talk to Our Team',
            'ctaRoute' => 'public.contact',
        ],
        [
            'title' => 'ISO Implementations at Yellowquip',
            'category' => 'ISO and Compliance',
            'image' => 'article-iso-implementations.jpg',
            'excerpt' => "Yellowquip's ISO implementation initiative supports safety, quality, environmental responsibility, asset management, and information security through structured planning, training, documentation, internal audits, and continuous improvement.",
            'content' => [
                'Yellowquip Zambia Limited has launched initiatives to integrate internationally recognized ISO standards into its operations. These standards support safer workplaces, stronger service quality, environmental responsibility, improved asset management, and better information security.',
                'The implementation focus includes ISO 45001 for Occupational Health and Safety, ISO 9001 for Quality Management, ISO 14001 for Environmental Management, ISO 27001 for Information Security, and ISO 55001 for Asset Management.',
                'A structured implementation process begins with gap analysis and planning. This is followed by awareness training, documentation development, process mapping, internal audits, corrective actions, and certification preparation.',
                'ISO 45001 helps Yellowquip create safer workplaces through hazard identification, risk assessments, toolbox talks, emergency response planning, training programs, and incident reporting.',
                'ISO 14001 supports environmental responsibility through waste management, spill prevention, eco-conscious equipment use, green procurement, and environmental awareness.',
                'ISO 55001 supports the management of rental equipment throughout its lifecycle. It helps track assets, maintenance schedules, performance, utilization, risk, and value.',
                'ISO 9001 strengthens quality control and customer satisfaction, while ISO 27001 supports secure handling of information, digital records, and access controls.',
                'Together, these standards help Yellowquip build a stronger, safer, more transparent, and more reliable organization.',
            ],
            'ctaText' => 'Interested in ISO-aligned equipment services or operational support?',
            'ctaButton' => 'Inquire With Us',
            'ctaRoute' => 'public.contact',
        ],
        [
            'title' => 'Equipment Operations and Maintenance SOP Awareness',
            'category' => 'SOP and Safety',
            'image' => 'article-equipment-operations-sop.jpg',
            'excerpt' => "Yellowquip's SOP culture supports safety, equipment reliability, compliance, and consistent work practices. Public articles may describe the purpose of SOPs, but the actual SOP manuals remain private and controlled through the Member Portal.",
            'content' => [
                'Standard Operating Procedures are an important part of Yellowquip\'s approach to safe and reliable equipment operations. They provide clear guidelines for maintenance, inspections, equipment handling, safety responsibilities, environmental awareness, and employee development.',
                'The purpose of SOPs is to establish consistent procedures, reduce risks, promote safety culture, and support compliance with relevant standards. SOPs help employees, contractors, and visitors understand their responsibilities and the expected way of working.',
                "Yellowquip's SOP framework supports policies related to safety and health, security, environmental responsibility, training and employee development, asset register management, vehicle pre-operational checks, shuttle bus procedures, tire stacking, and hand tool control.",
                'These procedures help strengthen operational discipline and improve the lifespan of rental equipment. They also support audit readiness by keeping work instructions, responsibilities, records, and review cycles organized.',
            ],
            'note' => 'Actual SOP files, internal procedures, checklists, document codes, signatures, and controlled manuals are intended for authorized Yellowquip users only. They must not be reproduced or distributed publicly. Controlled SOP documents are available only to authorized users through the Member Portal.',
            'ctaText' => 'Authorized users may access controlled SOP documents through the Member Portal. For business and service inquiries, contact the Yellowquip team.',
            'ctaButton' => 'Contact Us',
            'ctaRoute' => 'public.contact',
        ],
        [
            'title' => 'How We Motivate Our Employees — Safety Is Our Priority',
            'category' => 'People and Safety Culture',
            'image' => 'article-employee-motivation-safety.jpg',
            'excerpt' => 'Yellowquip strengthens employee motivation through recognition, growth, safety culture, clear communication, and appreciation for quality work.',
            'content' => [
                'At Yellowquip, motivated employees are at the center of strong service delivery. A reliable equipment rental and maintenance company depends on people who understand safety, quality, customer service, and accountability.',
                'One motivation strategy is recognizing safety and quality excellence. Yellowquip values safe practices, clean audits, and zero-incident milestones. Monthly recognition programs such as "Safety Champion" and "Quality Hero" can highlight team members who go beyond expectations.',
                'A Safety Champion may be awarded to an individual who demonstrates strong commitment to workplace safety, hazard reporting, and proactive risk management. A Quality Hero may recognize a team member who consistently upholds strong standards in equipment handling, customer service, and operational precision.',
                "Safety is not only a checklist; it is part of Yellowquip's culture. Daily inspections, PPE compliance, hazard reporting, equipment checks, and ISO-aligned systems all contribute to safer work.",
                "Each zero-incident milestone reflects the team's discipline, care, and professionalism. Yellowquip continues to promote appreciation, opportunity, clear communication, and continuous improvement so employees feel inspired to deliver excellence.",
            ],
            'ctaText' => 'Want to work with a team that values safety, quality, and people?',
            'ctaButton' => 'Connect With Yellowquip',
            'ctaRoute' => 'public.contact',
        ],
        [
            'title' => 'How Yellowquip Runs an Equipment Rental Company',
            'category' => 'Equipment Rental Operations',
            'image' => 'article-rental-equipment-company.jpg',
            'excerpt' => "Yellowquip's rental operations are built on safety, reliable service, smart fleet management, people development, and growth with integrity.",
            'content' => [
                'Running an equipment rental company like Yellowquip requires more than moving machines. It requires strategic planning, operational discipline, customer-focused service, strong maintenance systems, and a safety-first mindset.',
                "Yellowquip's rental operations are built on five key pillars.",
                'Safety First, Always: Every piece of equipment carries a promise of protection. ISO 45001 supports a culture of inspections, training, prevention, and responsible operation.',
                'Service That Sticks: Customers do not simply rent machines; they rent trust. Clear communication, timely delivery, and responsive support help build long-term relationships.',
                'Smart Fleet, Lean Operations: Preventive maintenance, digital tracking, and fleet optimization help reduce downtime, control costs, and improve asset utilization.',
                'People Powered: Operators, apprentices, technicians, and support staff all contribute to service quality. Training and empowerment help teams deliver better customer experiences.',
                "Growth With Integrity: Yellowquip's growth is guided by safety, quality, environmental responsibility, asset management, and transparent service practices.",
                'The company supports rental success through market evaluation, fleet optimization, smart pricing, digital operations, safety compliance, customer support, training, marketing, and revenue diversification.',
            ],
            'ctaText' => 'Need reliable rental support for your next project?',
            'ctaButton' => 'Request Equipment Support',
            'ctaRoute' => 'public.contact',
        ],
        [
            'title' => 'YQL Gallery: Operations, Milestones, and Team Achievements',
            'category' => 'Gallery and Updates',
            'image' => 'article-gallery.jpg',
            'excerpt' => "The YQL Gallery is a public visual showcase of Yellowquip's equipment services, training activities, safety initiatives, field operations, and completed works.",
            'content' => [
                "The YQL Gallery presents public-safe highlights from Yellowquip's operations, milestones, and team achievements. It reflects the company's commitment to equipment service, training, safety, ISO implementation, and operational excellence.",
                'The gallery may include photos of equipment deployment, maintenance activities, training programs, field operations, completed works, and team achievements.',
                "This visual record helps customers and partners understand the practical work behind Yellowquip's services. It also shows the company's focus on safety, reliability, and continuous improvement.",
            ],
            'note' => 'Only approved public images should be shown in the gallery. Internal documents, SOP screenshots, audit records, contracts, RFQ files, client-specific reports, and private repository content should never be displayed publicly.',
            'ctaText' => "See Yellowquip's work in action or inquire about a service.",
            'ctaButton' => 'View Project Gallery',
            'ctaRoute' => 'public.project-gallery',
        ],
    ];
@endphp

<section class="hero-banner articles-hero">
    <div class="home-hero-inner">
        <h1>Articles</h1>
        <p class="hero-subtitle">Insights from Yellowquip's operations, planning, safety, training, and equipment service experience.</p>
        <p class="hero-desc">
            Explore Yellowquip's stories, strategies, and operational insights. These articles highlight the
            company's beginnings, equipment rental practices, ISO-aligned initiatives, planning systems,
            employee motivation, and safety-first culture.
        </p>
    </div>
</section>

<section class="public-section">

    <div class="article-grid">
        @foreach ($articles as $i => $article)
            <article class="article-card">
                <div class="article-card-image">
                    <img src="{{ asset('assets/images/articles/' . $article['image']) }}"
                         alt="{{ $article['title'] }}"
                         loading="lazy"
                         onerror="if (!this.dataset.fallback) { this.dataset.fallback='1'; this.src='{{ asset('assets/images/placeholders/placeholder-article.jpg') }}'; } else { this.style.display='none'; this.nextElementSibling.style.display='flex'; }">
                    <div class="gallery-placeholder" style="display:none;">
                        <x-icon name="camera" class="icon-lg" />
                    </div>
                </div>
                <div class="article-meta">
                    <span class="article-tag">{{ $article['category'] }}</span>
                </div>
                <h3>{{ $article['title'] }}</h3>
                <p>{{ $article['excerpt'] }}</p>

                <button type="button"
                        class="article-read-more article-toggle-btn"
                        data-open-label="Read More"
                        data-close-label="Show Less"
                        aria-expanded="false"
                        aria-controls="article-detail-{{ $i }}">
                    Read More &rsaquo;
                </button>

                <div class="article-full-content" id="article-detail-{{ $i }}">
                    @foreach ($article['content'] as $paragraph)
                        <p>{{ $paragraph }}</p>
                    @endforeach

                    @if (!empty($article['note']))
                        <p class="article-public-note">
                            <strong>{{ $article['category'] === 'SOP and Safety' ? 'Public Note:' : 'Public Safety Note:' }}</strong>
                            {{ $article['note'] }}
                        </p>
                    @endif

                    <div class="article-cta-box">
                        <p>{{ $article['ctaText'] }}</p>
                        <a href="{{ route($article['ctaRoute']) }}" class="btn btn-accent btn-sm">{{ $article['ctaButton'] }}</a>
                    </div>
                </div>
            </article>
        @endforeach
    </div>

</section>

{{-- Bottom CTA section --}}
<section class="public-section">
    <div class="lease-cta-box">
        <h3>Turn insight into action with Yellowquip.</h3>
        <p>
            From equipment rentals and maintenance to training, planning, and ISO-aligned operations,
            Yellowquip is here to support customers, partners, and project teams with practical expertise.
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
