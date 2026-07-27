<?php

namespace Database\Seeders;

use App\Models\ExternalLink;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ExternalLinkSeeder extends Seeder
{
    public function run(): void
    {
        $links = [
            // ── ISO and Compliance Resources ──────────────────────────────
            [
                'category'   => 'ISO and Compliance Resources',
                'icon'       => 'check-circle',
                'title'      => 'ISO 45001 — Occupational Health & Safety',
                'url'        => 'https://www.iso.org/iso-45001-occupational-health-and-safety.html',
                'link_label' => 'Visit ISO.org',
                'excerpt'    => 'The international standard for occupational health and safety management systems.',
                'sort_order' => 10,
            ],
            [
                'category'   => 'ISO and Compliance Resources',
                'icon'       => 'check-circle',
                'title'      => 'ISO 9001 — Quality Management',
                'url'        => 'https://www.iso.org/iso-9001-quality-management.html',
                'link_label' => 'Visit ISO.org',
                'excerpt'    => "The world's most recognised quality management system standard for consistent service delivery.",
                'sort_order' => 20,
            ],
            [
                'category'   => 'ISO and Compliance Resources',
                'icon'       => 'check-circle',
                'title'      => 'ISO 14001 — Environmental Management',
                'url'        => 'https://www.iso.org/iso-14001-environmental-management.html',
                'link_label' => 'Visit ISO.org',
                'excerpt'    => 'Framework for managing environmental responsibilities in a systematic way.',
                'sort_order' => 30,
            ],
            [
                'category'   => 'ISO and Compliance Resources',
                'icon'       => 'check-circle',
                'title'      => 'ISO 27001 — Information Security',
                'url'        => 'https://www.iso.org/isoiec-27001-information-security.html',
                'link_label' => 'Visit ISO.org',
                'excerpt'    => 'International standard for information security management systems and data protection.',
                'sort_order' => 40,
            ],
            [
                'category'   => 'ISO and Compliance Resources',
                'icon'       => 'check-circle',
                'title'      => 'ISO 55001 — Asset Management',
                'url'        => 'https://www.iso.org/standard/55089.html',
                'link_label' => 'Visit ISO.org',
                'excerpt'    => 'Standard for managing physical assets such as heavy equipment fleets over their lifecycle.',
                'sort_order' => 50,
            ],
            // ── Safety and Workplace Standards ───────────────────────────
            [
                'category'   => 'Safety and Workplace Standards',
                'icon'       => 'alert-triangle',
                'title'      => 'Mines Safety Department — Zambia',
                'url'        => 'https://www.msd.gov.zm',
                'link_label' => 'Visit MSD',
                'excerpt'    => 'Government department responsible for mine safety regulation and inspections in Zambia.',
                'sort_order' => 10,
            ],
            [
                'category'   => 'Safety and Workplace Standards',
                'icon'       => 'alert-triangle',
                'title'      => 'International Labour Organization (ILO) — Safety',
                'url'        => 'https://www.ilo.org/global/topics/safety-and-health-at-work/lang--en/index.htm',
                'link_label' => 'Visit ILO',
                'excerpt'    => 'ILO resources on occupational safety and health for the mining and construction sectors.',
                'sort_order' => 20,
            ],
            // ── Environmental Management ──────────────────────────────────
            [
                'category'   => 'Environmental Management',
                'icon'       => 'globe',
                'title'      => 'Zambia Environmental Management Agency (ZEMA)',
                'url'        => 'https://www.zema.org.zm',
                'link_label' => 'Visit ZEMA',
                'excerpt'    => "Zambia's environmental management and regulatory authority for industrial operations.",
                'sort_order' => 10,
            ],
            // ── Training and Skills Development Resources ─────────────────
            [
                'category'   => 'Training and Skills Development Resources',
                'icon'       => 'book-open',
                'title'      => 'Technical Education, Vocational & Entrepreneurship Training Authority (TEVETA)',
                'url'        => 'https://www.teveta.org.zm',
                'link_label' => 'Visit TEVETA',
                'excerpt'    => "Zambia's authority responsible for technical education and vocational training standards.",
                'sort_order' => 10,
            ],
            [
                'category'   => 'Training and Skills Development Resources',
                'icon'       => 'book-open',
                'title'      => 'ILO — Apprenticeship Resources',
                'url'        => 'https://www.ilo.org/global/topics/apprenticeships/lang--en/index.htm',
                'link_label' => 'Visit ILO',
                'excerpt'    => 'International guidance on structuring apprenticeship and on-the-job training programmes.',
                'sort_order' => 20,
            ],
            // ── Equipment and Maintenance Resources ───────────────────────
            [
                'category'   => 'Equipment and Maintenance Resources',
                'icon'       => 'tool',
                'title'      => 'Caterpillar — Equipment Reference',
                'url'        => 'https://www.cat.com',
                'link_label' => 'Visit CAT',
                'excerpt'    => 'OEM resources and technical references for Caterpillar heavy equipment used in mining and construction.',
                'sort_order' => 10,
            ],
            [
                'category'   => 'Equipment and Maintenance Resources',
                'icon'       => 'tool',
                'title'      => 'Komatsu — Equipment Reference',
                'url'        => 'https://www.komatsu.com',
                'link_label' => 'Visit Komatsu',
                'excerpt'    => 'OEM references for Komatsu heavy machinery including excavators, bulldozers, and motor graders.',
                'sort_order' => 20,
            ],
            [
                'category'   => 'Equipment and Maintenance Resources',
                'icon'       => 'tool',
                'title'      => 'Hitachi / LiuGong — Guangxi Liugong Machinery Co., Ltd.',
                'url'        => 'https://www.liugong.com',
                'link_label' => 'Visit LiuGong',
                'excerpt'    => 'State-linked heavy equipment manufacturer headquartered in Liuzhou, Guangxi, China. Main products include loaders, excavators, graders, forklifts, mobile cranes, compactors, and agricultural machinery.',
                'note'       => 'Ultimate Controller: Guangxi SASAC (24.62%) — State-owned enterprise with mixed public listing.',
                'content'    => '<h3>📊 Company Overview</h3><ul><li><strong>Name:</strong> Guangxi Liugong Machinery Co., Ltd.</li><li><strong>Headquarters:</strong> Liuzhou, Guangxi, China</li><li><strong>Employees:</strong> ~15,000–16,600 globally</li><li><strong>Main Products:</strong> Loaders, excavators, graders, forklifts, mobile cranes, compactors, agricultural machinery, and financial services</li></ul><h3>🏢 Ownership &amp; Control</h3><ul><li><strong>Controlling Shareholder:</strong> Guangxi Liugong Group Co., Ltd. (25.94%)</li><li><strong>Ultimate Controller:</strong> Guangxi SASAC — State-owned Assets Supervision and Administration Commission (24.62%)</li><li><strong>Nature:</strong> State-owned enterprise with mixed public listing</li></ul><h3>👔 Governance Structure</h3><p>The company is structured as a state-linked enterprise with the Guangxi SASAC as its ultimate controller, a board of directors overseeing governance, and an executive committee led by Chairman Zheng Jin and CEO Guo Bing Luo.</p><ul><li><strong>Chairman (Board Chair):</strong> Zheng Jin (党委书记)</li><li><strong>Key Directors:</strong> Zi Meng Su, Xueping Chen, Yu Ning Li, Cheng Zhang, Xu Huang, Guo Bing Luo</li></ul>',
                'topics'     => 'Equipment, OEM, China, Heavy Machinery, State-Owned Enterprise',
                'sort_order' => 30,
            ],
            // ── Mining and Construction Industry References ───────────────
            [
                'category'   => 'Mining and Construction Industry References',
                'icon'       => 'alert-triangle',
                'title'      => 'Zambia Chamber of Mines',
                'url'        => 'https://www.zambiamining.co.zm',
                'link_label' => 'Visit ZCM',
                'excerpt'    => 'Industry body representing mining companies and related service providers in Zambia.',
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
    }
}
