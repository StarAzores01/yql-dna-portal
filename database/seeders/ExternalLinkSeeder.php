<?php

namespace Database\Seeders;

use App\Models\ExternalLink;
use Illuminate\Database\Seeder;

class ExternalLinkSeeder extends Seeder
{
    public function run(): void
    {
        $links = [
            // ISO and Compliance Resources
            [
                'category' => 'ISO and Compliance Resources',
                'icon' => 'check-circle',
                'title' => 'ISO 45001 — Occupational Health & Safety',
                'url' => 'https://www.iso.org/iso-45001-occupational-health-and-safety.html',
                'description' => 'The international standard for occupational health and safety management systems.',
                'sort_order' => 10,
            ],
            [
                'category' => 'ISO and Compliance Resources',
                'icon' => 'check-circle',
                'title' => 'ISO 9001 — Quality Management',
                'url' => 'https://www.iso.org/iso-9001-quality-management.html',
                'description' => "The world's most recognised quality management system standard for consistent service delivery.",
                'sort_order' => 20,
            ],
            [
                'category' => 'ISO and Compliance Resources',
                'icon' => 'check-circle',
                'title' => 'ISO 14001 — Environmental Management',
                'url' => 'https://www.iso.org/iso-14001-environmental-management.html',
                'description' => 'Framework for managing environmental responsibilities in a systematic way.',
                'sort_order' => 30,
            ],
            [
                'category' => 'ISO and Compliance Resources',
                'icon' => 'check-circle',
                'title' => 'ISO 27001 — Information Security',
                'url' => 'https://www.iso.org/isoiec-27001-information-security.html',
                'description' => 'International standard for information security management systems and data protection.',
                'sort_order' => 40,
            ],
            [
                'category' => 'ISO and Compliance Resources',
                'icon' => 'check-circle',
                'title' => 'ISO 55001 — Asset Management',
                'url' => 'https://www.iso.org/standard/55089.html',
                'description' => 'Standard for managing physical assets such as heavy equipment fleets over their lifecycle.',
                'sort_order' => 50,
            ],
            // Safety and Workplace Standards
            [
                'category' => 'Safety and Workplace Standards',
                'icon' => 'alert-triangle',
                'title' => 'Mines Safety Department — Zambia',
                'url' => 'https://www.msd.gov.zm',
                'description' => 'Government department responsible for mine safety regulation and inspections in Zambia.',
                'sort_order' => 10,
            ],
            [
                'category' => 'Safety and Workplace Standards',
                'icon' => 'alert-triangle',
                'title' => 'International Labour Organization (ILO) — Safety',
                'url' => 'https://www.ilo.org/global/topics/safety-and-health-at-work/lang--en/index.htm',
                'description' => 'ILO resources on occupational safety and health for the mining and construction sectors.',
                'sort_order' => 20,
            ],
            // Environmental Management
            [
                'category' => 'Environmental Management',
                'icon' => 'globe',
                'title' => 'Zambia Environmental Management Agency (ZEMA)',
                'url' => 'https://www.zema.org.zm',
                'description' => "Zambia's environmental management and regulatory authority for industrial operations.",
                'sort_order' => 10,
            ],
            // Training and Skills Development Resources
            [
                'category' => 'Training and Skills Development Resources',
                'icon' => 'book-open',
                'title' => 'Technical Education, Vocational & Entrepreneurship Training Authority (TEVETA)',
                'url' => 'https://www.teveta.org.zm',
                'description' => "Zambia's authority responsible for technical education and vocational training standards.",
                'sort_order' => 10,
            ],
            [
                'category' => 'Training and Skills Development Resources',
                'icon' => 'book-open',
                'title' => 'ILO — Apprenticeship Resources',
                'url' => 'https://www.ilo.org/global/topics/apprenticeships/lang--en/index.htm',
                'description' => 'International guidance on structuring apprenticeship and on-the-job training programmes.',
                'sort_order' => 20,
            ],
            // Equipment and Maintenance Resources
            [
                'category' => 'Equipment and Maintenance Resources',
                'icon' => 'tool',
                'title' => 'Caterpillar — Equipment Reference',
                'url' => 'https://www.cat.com',
                'description' => 'OEM resources and technical references for Caterpillar heavy equipment used in mining and construction.',
                'sort_order' => 10,
            ],
            [
                'category' => 'Equipment and Maintenance Resources',
                'icon' => 'tool',
                'title' => 'Komatsu — Equipment Reference',
                'url' => 'https://www.komatsu.com',
                'description' => 'OEM references for Komatsu heavy machinery including excavators, bulldozers, and motor graders.',
                'sort_order' => 20,
            ],
            [
                'category' => 'Equipment and Maintenance Resources',
                'icon' => 'tool',
                'title' => 'Hitachi / LiuGong — Guangxi Liugong Machinery Co., Ltd.',
                'url' => 'https://www.liugong.com',
                'description' => 'Hitachi / LiuGong (Guangxi Liugong Machinery Co., Ltd.) is structured as a state-linked enterprise with the Guangxi SASAC as its ultimate controller. Headquarters: Liuzhou, Guangxi, China. Employees: ~15,000–16,600 globally. Main Products: Loaders, excavators, graders, forklifts, mobile cranes, compactors, agricultural machinery, and financial services. Controlling Shareholder: Guangxi Liugong Group Co., Ltd. (25.94%). Ultimate Controller: Guangxi SASAC (24.62%). Board Chairman: Zheng Jin (党委书记). Key Directors: Zi Meng Su, Xueping Chen, Yu Ning Li, Cheng Zhang, Xu Huang, Guo Bing Luo.',
                'sort_order' => 30,
            ],
            // Mining and Construction Industry References
            [
                'category' => 'Mining and Construction Industry References',
                'icon' => 'alert-triangle',
                'title' => 'Zambia Chamber of Mines',
                'url' => 'https://www.zambiamining.co.zm',
                'description' => 'Industry body representing mining companies and related service providers in Zambia.',
                'sort_order' => 10,
            ],
        ];

        foreach ($links as $link) {
            ExternalLink::firstOrCreate(
                ['url' => $link['url']],
                $link
            );
        }
    }
}
