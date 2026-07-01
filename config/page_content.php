<?php

// Editable text/image regions for the static public pages. Each field's
// "default" is the page's current hardcoded copy — if an admin never edits
// a field (or the page_contents table is empty), the public page renders
// this exact text, so a fresh migrate never changes what's live.
//
// type: "html"    — short raw-HTML snippet (e.g. a heading that may contain
//                    a <span> for the site's two-tone title style)
//       "text"    — plain single-line text, HTML-escaped on output
//       "textarea"— plain multi-line text, HTML-escaped on output
//       "image"   — uploaded image path (public disk); default is an
//                    asset() path shipped with the app, not a storage path

return [
    'home' => [
        ['key' => 'hero_heading', 'label' => 'Hero Heading', 'type' => 'html', 'default' => '<span>YellowQuip</span> Zambia Limited'],
        ['key' => 'hero_subtitle', 'label' => 'Hero Subtitle', 'type' => 'text', 'default' => 'Tools You Trust, Rentals You Rely On.'],
        ['key' => 'hero_desc', 'label' => 'Hero Description', 'type' => 'textarea', 'default' => 'YellowQuip Zambia Limited is a heavy equipment rental, maintenance, training, and ISO-aligned operations company based in Chingola, Copperbelt, Zambia. Established in 2008, YellowQuip supports mining, construction, industrial, and maintenance operations through reliable equipment services, skilled training, technical support, and organized compliance practices.'],
        ['key' => 'hero_image', 'label' => 'Hero Background Image', 'type' => 'image', 'default' => 'assets/images/hero/home-hero-equipment-01.jpg'],
    ],
    'about' => [
        ['key' => 'hero_heading', 'label' => 'Hero Heading', 'type' => 'html', 'default' => 'About <span>YellowQuip</span>'],
        ['key' => 'hero_desc', 'label' => 'Hero Description', 'type' => 'textarea', 'default' => 'YellowQuip Zambia Limited was established in 2008 and operates from Chingola, Copperbelt, Zambia. The company provides heavy equipment rental, equipment maintenance, parts support, technical services, training, and project-related support for mining, construction, industrial, and maintenance operations.'],
    ],
    'services' => [
        ['key' => 'hero_heading', 'label' => 'Hero Heading', 'type' => 'html', 'default' => 'Services'],
        ['key' => 'hero_subtitle', 'label' => 'Hero Subtitle', 'type' => 'text', 'default' => 'Empowering Progress, One Service at a Time.'],
        ['key' => 'hero_desc', 'label' => 'Hero Description', 'type' => 'textarea', 'default' => 'At YellowQuip, we do not just rent equipment — we deliver performance, reliability, and peace of mind. Our services are designed to keep operations running smoothly, safely, and efficiently, regardless of project scale or complexity.'],
    ],
    'lease' => [
        ['key' => 'hero_heading', 'label' => 'Hero Heading', 'type' => 'html', 'default' => 'Lease'],
        ['key' => 'hero_subtitle', 'label' => 'Hero Subtitle', 'type' => 'text', 'default' => 'Where Every Lease Drives Value.'],
        ['key' => 'hero_desc', 'label' => 'Hero Description', 'type' => 'textarea', 'default' => "YellowQuip's lease packages are designed to give customers flexible equipment options based on project needs, duration, support requirements, and operational priorities."],
    ],
    'external-links' => [
        ['key' => 'hero_heading', 'label' => 'Hero Heading', 'type' => 'html', 'default' => 'External <span>Resources</span>'],
        ['key' => 'hero_desc', 'label' => 'Hero Description', 'type' => 'textarea', 'default' => 'A curated list of publicly accessible resources covering ISO standards, mining safety, heavy equipment, skills training, and industry compliance. All links open in a new tab.'],
    ],
    'project-gallery' => [
        ['key' => 'hero_heading', 'label' => 'Hero Heading', 'type' => 'html', 'default' => 'Project <span>Gallery</span>'],
        ['key' => 'hero_desc', 'label' => 'Hero Description', 'type' => 'textarea', 'default' => 'Tools You Trust, Rentals You Rely On. YellowQuip is ISO 45001, ISO 27001, ISO 14001, ISO 9001, and ISO 55001 compliant. Customer satisfaction is our strength, and we aim to meet customer demands and go beyond expectations.'],
    ],
];
