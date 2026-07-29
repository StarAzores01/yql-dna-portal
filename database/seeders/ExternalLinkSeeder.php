<?php

namespace Database\Seeders;

use App\Models\ExternalLink;
use Illuminate\Database\Seeder;

class ExternalLinkSeeder extends Seeder
{
    public function run(): void
    {
        $links = [
            // ── ISO and Compliance Resources ──────────────────────────────
            [
                'category' => 'ISO and Compliance Resources',
                'icon' => 'check-circle',
                'title' => 'ISO 45001 — Occupational Health & Safety',
                'url' => 'https://www.iso.org/iso-45001-occupational-health-and-safety.html',
                'link_label' => 'Visit ISO.org',
                'excerpt' => 'The international standard for occupational health and safety management systems.',
                'sort_order' => 10,
            ],
            [
                'category' => 'ISO and Compliance Resources',
                'icon' => 'check-circle',
                'title' => 'ISO 9001 — Quality Management',
                'url' => 'https://www.iso.org/iso-9001-quality-management.html',
                'link_label' => 'Visit ISO.org',
                'excerpt' => "The world's most recognised quality management system standard for consistent service delivery.",
                'sort_order' => 20,
            ],
            [
                'category' => 'ISO and Compliance Resources',
                'icon' => 'check-circle',
                'title' => 'ISO 14001 — Environmental Management',
                'url' => 'https://www.iso.org/iso-14001-environmental-management.html',
                'link_label' => 'Visit ISO.org',
                'excerpt' => 'Framework for managing environmental responsibilities in a systematic way.',
                'sort_order' => 30,
            ],
            [
                'category' => 'ISO and Compliance Resources',
                'icon' => 'check-circle',
                'title' => 'ISO 27001 — Information Security',
                'url' => 'https://www.iso.org/isoiec-27001-information-security.html',
                'link_label' => 'Visit ISO.org',
                'excerpt' => 'International standard for information security management systems and data protection.',
                'sort_order' => 40,
            ],
            [
                'category' => 'ISO and Compliance Resources',
                'icon' => 'check-circle',
                'title' => 'ISO 55001 — Asset Management',
                'url' => 'https://www.iso.org/standard/55089.html',
                'link_label' => 'Visit ISO.org',
                'excerpt' => 'Standard for managing physical assets such as heavy equipment fleets over their lifecycle.',
                'sort_order' => 50,
            ],
            // ── Safety and Workplace Standards ───────────────────────────
            [
                'category' => 'Safety and Workplace Standards',
                'icon' => 'alert-triangle',
                'title' => 'Mines Safety Department — Zambia',
                'url' => 'https://www.msd.gov.zm',
                'link_label' => 'Visit MSD',
                'excerpt' => 'Government department responsible for mine safety regulation and inspections in Zambia.',
                'sort_order' => 10,
            ],
            [
                'category' => 'Safety and Workplace Standards',
                'icon' => 'alert-triangle',
                'title' => 'International Labour Organization (ILO) — Safety',
                'url' => 'https://www.ilo.org/global/topics/safety-and-health-at-work/lang--en/index.htm',
                'link_label' => 'Visit ILO',
                'excerpt' => 'ILO resources on occupational safety and health for the mining and construction sectors.',
                'sort_order' => 20,
            ],
            // ── Environmental Management ──────────────────────────────────
            [
                'category' => 'Environmental Management',
                'icon' => 'globe',
                'title' => 'Zambia Environmental Management Agency (ZEMA)',
                'url' => 'https://www.zema.org.zm',
                'link_label' => 'Visit ZEMA',
                'excerpt' => "Zambia's environmental management and regulatory authority for industrial operations.",
                'sort_order' => 10,
            ],
            // ── Training and Skills Development Resources ─────────────────
            [
                'category' => 'Training and Skills Development Resources',
                'icon' => 'book-open',
                'title' => 'Technical Education, Vocational & Entrepreneurship Training Authority (TEVETA)',
                'url' => 'https://www.teveta.org.zm',
                'link_label' => 'Visit TEVETA',
                'excerpt' => "Zambia's authority responsible for technical education and vocational training standards.",
                'sort_order' => 10,
            ],
            [
                'category' => 'Training and Skills Development Resources',
                'icon' => 'book-open',
                'title' => 'ILO — Apprenticeship Resources',
                'url' => 'https://www.ilo.org/global/topics/apprenticeships/lang--en/index.htm',
                'link_label' => 'Visit ILO',
                'excerpt' => 'International guidance on structuring apprenticeship and on-the-job training programmes.',
                'sort_order' => 20,
            ],
            // ── Equipment and Maintenance Resources ───────────────────────
            [
                'category' => 'Equipment and Maintenance Resources',
                'icon' => 'tool',
                'title' => 'Caterpillar — Equipment Reference',
                'url' => 'https://www.cat.com',
                'link_label' => 'Visit CAT',
                'excerpt' => 'OEM resources and technical references for Caterpillar heavy equipment used in mining and construction.',
                'sort_order' => 10,
            ],
            [
                'category' => 'Equipment and Maintenance Resources',
                'icon' => 'tool',
                'title' => 'Komatsu — Equipment Reference',
                'url' => 'https://www.komatsu.com',
                'link_label' => 'Visit Komatsu',
                'excerpt' => 'OEM references for Komatsu heavy machinery including excavators, bulldozers, and motor graders.',
                'sort_order' => 20,
            ],
            // ── Mining and Construction Industry References ───────────────
            [
                'category' => 'Mining and Construction Industry References',
                'icon' => 'alert-triangle',
                'title' => 'Zambia Chamber of Mines',
                'url' => 'https://www.zambiamining.co.zm',
                'link_label' => 'Visit ZCM',
                'excerpt' => 'Industry body representing mining companies and related service providers in Zambia.',
                'sort_order' => 10,
            ],
        ];

        foreach ($links as $data) {
            $data['status'] = 'published';
            ExternalLink::firstOrCreate(
                ['url' => $data['url']],
                array_merge($data, ['slug' => ExternalLink::uniqueSlugFrom($data['title'])])
            );
        }

        $this->seedLiuGong();
    }

    /**
     * Seeded separately (rather than through the firstOrCreate loop above)
     * because it is matched loosely by name — the display title changed
     * from earlier drafts of this content — and needs updateOrCreate
     * semantics so re-running the seeder backfills the structured profile
     * fields onto an already-existing row instead of skipping it.
     */
    private function seedLiuGong(): void
    {
        $data = [
            'category' => 'Equipment and Maintenance Resources',
            'icon' => 'tool',
            'title' => 'Guangxi Liugong Machinery Co., Ltd.',
            'display_title' => 'Hitachi / LiuGong',
            'url' => null,
            'link_label' => 'Visit LiuGong',
            'excerpt' => 'A state-linked machinery enterprise associated with Guangxi SASAC, with governance oversight through a board of directors and executive leadership.',
            'full_description' => 'Hitachi / LiuGong (Guangxi Liugong Machinery Co., Ltd.) is structured as a state-linked enterprise with the Guangxi SASAC (State-owned Assets Supervision and Administration Commission) as its ultimate controller, a board of directors overseeing governance, and an executive committee led by Chairman Zheng Jin and CEO Guo Bing Luo.',
            'content' => null,
            'note' => null,
            'topics' => 'Machinery, State-linked Enterprise, China, Construction Equipment, Governance',
            'sort_order' => 1,

            // Company Overview
            'headquarters' => 'Liuzhou, Guangxi, China',
            'employee_count' => 'Approximately 15,000 to 16,600 globally',
            'main_products' => 'Loaders, excavators, graders, forklifts, mobile cranes, compactors, agricultural machinery, and financial services',
            'industry' => null,
            'country' => 'China',
            'website_url' => null,

            // Ownership and Control
            'controlling_shareholder' => 'Guangxi Liugong Group Co., Ltd.',
            'controlling_shareholder_percentage' => '25.94%',
            'ultimate_controller' => 'Guangxi SASAC',
            'ultimate_controller_percentage' => '24.62%',
            'company_nature' => 'State-owned enterprise with mixed public listing',

            // Governance Structure
            'chairman' => 'Zheng Jin',
            'ceo' => 'Guo Bing Luo',
            'key_directors' => 'Zi Meng Su, Xueping Chen, Yu Ning Li, Cheng Zhang, Xu Huang, Guo Bing L',
            'governance_notes' => 'The company is overseen by a board of directors and led by an executive committee.',

            'status' => 'published',
        ];

        $existing = ExternalLink::where('title', 'like', '%Liugong%')
            ->orWhere('title', 'like', '%LiuGong%')
            ->first();

        if ($existing) {
            $existing->update($data);

            return;
        }

        ExternalLink::create(array_merge($data, [
            'slug' => ExternalLink::uniqueSlugFrom($data['title']),
        ]));
    }
}
