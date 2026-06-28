@extends('layouts.public')
@section('title', 'Management Team — Yellowquip Zambia Limited')
@section('meta_description', 'Meet the Yellowquip Zambia Limited team leading operations, finance, maintenance, training, safety, projects, and service delivery.')

@section('content')

@php
    $team = [
        [
            'name' => 'Emmanuel Gardner',
            'position' => 'Managing Director',
            'photo' => 'team-emmanuel-gardner.png',
            'initials' => 'EG',
            'desc' => "Emmanuel Gardner serves as the Managing Director, leveraging exceptional leadership skills and extensive expertise to guide the company's strategic vision and ensure seamless operational execution.",
        ],
        [
            'name' => 'Lister Manda',
            'position' => 'Business Controller',
            'photo' => 'team-lister-manda.jpg',
            'initials' => 'LM',
            'desc' => 'Lister Manda serves as the Business Controller, overseeing financial planning, budgeting, and analysis to guide strategic decision-making and ensure resource optimization within the organization.',
        ],
        [
            'name' => 'David Kamuti',
            'position' => 'Parts Manager',
            'photo' => 'team-david-kamuti.png',
            'initials' => 'DK',
            'desc' => 'David Kamuti is the dedicated Parts Manager of Yellowquip. With extensive knowledge and experience, he ensures seamless operations within the parts department by maintaining an organized inventory system and supporting efficient parts distribution. His attention to detail and commitment to service make him an integral member of the team.',
        ],
        [
            'name' => 'Lackstone Musonda',
            'position' => 'Project Manager',
            'photo' => 'team-lackstone-musonda.png',
            'initials' => 'LM',
            'desc' => 'Lackstone Musonda is a skilled Project Manager responsible for leading initiatives, coordinating teams, and supporting successful project delivery through effective planning and communication.',
        ],
        [
            'name' => 'Jeremiah Ngulube',
            'position' => 'Maintenance Manager',
            'photo' => 'team-jeremiah-ngulube.png',
            'initials' => 'JN',
            'desc' => 'Jeremiah Ngulube serves as the Maintenance Manager, overseeing the team responsible for maintaining equipment and ensuring optimum functionality. His expertise and dedication support operational efficiency and safety. He is also a Total Quality Management implementor and ISO advocate.',
        ],
        [
            'name' => 'Efren Semilla',
            'position' => 'Oversight Officer',
            'photo' => 'team-efren-semilla.png',
            'initials' => 'ES',
            'desc' => 'Efren Semilla serves as an Oversight Officer, supporting compliance and organizational standards. His responsibilities include monitoring processes, conducting evaluations, and promoting best practices that strengthen efficiency, accountability, and operational excellence.',
        ],
        [
            'name' => 'Mzinga Mwinga',
            'position' => 'Human Resources Manager',
            'photo' => 'team-mzinga-mwinga.png',
            'initials' => 'MM',
            'desc' => 'Mzinga Mwinga serves as the Human Resources Manager, supporting organizational growth and employee development. The role contributes to HR strategies aligned with company goals, workplace development, and improved operational efficiency.',
        ],
        [
            'name' => 'Hendrix Harawa',
            'position' => 'Safety Officer',
            'photo' => 'team-hendrix-harawa.png',
            'initials' => 'HH',
            'desc' => 'Hendrix Harawa is a dedicated and detail-oriented Safety Officer who plays a key role in ensuring the health, safety, and welfare of Yellowquip personnel. With a proactive approach to hazard identification and risk management, he supports workplace safety across operations.',
        ],
        [
            'name' => 'Kelvin Sichalwe',
            'position' => 'Lumwana Project Manager',
            'photo' => 'team-kelvin-sichalwe.jpg',
            'initials' => 'KS',
            'desc' => 'Kelvin Sichalwe oversees end-to-end project execution across equipment rental, parts, and service support for Lumwana operations. He manages planning, mobilization, day-to-day coordination, stakeholder communication, risk management, and continuous improvement to minimize downtime and support long-term client partnerships.',
        ],
        [
            'name' => 'Action Banda',
            'position' => 'YQL Training Manager',
            'photo' => 'team-action-banda.png',
            'initials' => 'AB',
            'desc' => "Action Banda leads Yellowquip's training initiatives for service and equipment rental operations. He designs onboarding and development programs that reinforce safe work practices, effective equipment handling, and streamlined parts and service processes. He is responsible for students enrolled in different heavy equipment operator programs and supports certification of proficiency in their chosen expertise.",
        ],
        [
            'name' => 'Fanwell Mungala',
            'position' => 'Chingola Maintenance Manager',
            'photo' => 'team-fanwell-mungala.png',
            'initials' => 'FM',
            'desc' => 'Fanwell Mungala serves as the Chingola Maintenance Manager, overseeing maintenance operations that support service, equipment rental, and parts programs. He leads preventive and corrective maintenance planning, ensuring equipment is inspected, serviced, and maintained for dependable condition. His work focuses on safety, uptime, cost control, and consistent performance across Chingola operations.',
        ],
    ];
@endphp

<section class="public-section management-section-top">

    <h2>Management Team</h2>
    <h3 class="section-subtitle">United in Purpose, Driven by Performance.</h3>
    <p class="section-intro">
        Meet the Yellowquip team leading operations, finance, maintenance, training, safety,
        projects, and service delivery. Each member contributes to the company's commitment
        to reliable performance, customer satisfaction, safety, and continuous improvement.
    </p>

    <div class="team-grid mgmt-grid">
        @foreach ($team as $member)
            <div class="team-card mgmt-card">
                <div class="mgmt-photo-wrap">
                    <img src="{{ asset('assets/images/team/' . $member['photo']) }}"
                         alt="{{ $member['name'] }} — {{ $member['position'] }}, Yellowquip Zambia Limited"
                         class="mgmt-photo"
                         loading="lazy"
                         onerror="this.style.display='none'; this.nextElementSibling.style.display='flex';">
                    <div class="avatar avatar-fallback">{{ $member['initials'] }}</div>
                </div>
                <div class="mgmt-card-body">
                    <h3>{{ $member['name'] }}</h3>
                    <p class="mgmt-role">{{ $member['position'] }}</p>
                    <p class="mgmt-desc">{{ $member['desc'] }}</p>
                </div>
            </div>
        @endforeach
    </div>

    {{-- General contact note — no personal contact numbers shown here; see Contact Us page --}}
    <div class="mgmt-footer-note">
        <p>
            To reach the Yellowquip team for equipment inquiries, rental arrangements,
            or service requests, visit our
            <a href="{{ route('public.contact') }}">Contact Us</a> page.
        </p>
    </div>

</section>

@endsection
