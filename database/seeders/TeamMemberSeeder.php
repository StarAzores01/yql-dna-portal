<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class TeamMemberSeeder extends Seeder
{
    /**
     * Ports the team members that used to be hardcoded in
     * resources/views/public/management-team.blade.php into the database,
     * so switching that page over to a DB-backed list doesn't lose anyone.
     */
    public function run(): void
    {
        if (TeamMember::count() > 0) {
            return;
        }

        $team = [
            ['name' => 'Emmanuel Gardner', 'position' => 'Managing Director', 'photo' => 'team-emmanuel-gardner.png', 'initials' => 'EG', 'bio' => "Emmanuel Gardner serves as the Managing Director, leveraging exceptional leadership skills and extensive expertise to guide the company's strategic vision and ensure seamless operational execution."],
            ['name' => 'Lister Manda', 'position' => 'Business Controller', 'photo' => 'team-lister-manda.jpg', 'initials' => 'LM', 'bio' => 'Lister Manda serves as the Business Controller, overseeing financial planning, budgeting, and analysis to guide strategic decision-making and ensure resource optimization within the organization.'],
            ['name' => 'David Kamuti', 'position' => 'Parts Manager', 'photo' => 'team-david-kamuti.png', 'initials' => 'DK', 'bio' => 'David Kamuti is the dedicated Parts Manager of YellowQuip. With extensive knowledge and experience, he ensures seamless operations within the parts department by maintaining an organized inventory system and supporting efficient parts distribution. His attention to detail and commitment to service make him an integral member of the team.'],
            ['name' => 'Lackstone Musonda', 'position' => 'Project Manager', 'photo' => 'team-lackstone-musonda.png', 'initials' => 'LM', 'bio' => 'Lackstone Musonda is a skilled Project Manager responsible for leading initiatives, coordinating teams, and supporting successful project delivery through effective planning and communication.'],
            ['name' => 'Jeremiah Ngulube', 'position' => 'Maintenance Manager', 'photo' => 'team-jeremiah-ngulube.png', 'initials' => 'JN', 'bio' => 'Jeremiah Ngulube serves as the Maintenance Manager, overseeing the team responsible for maintaining equipment and ensuring optimum functionality. His expertise and dedication support operational efficiency and safety. He is also a Total Quality Management implementor and ISO advocate.'],
            ['name' => 'Efren Semilla', 'position' => 'Oversight Officer', 'photo' => 'team-efren-semilla.png', 'initials' => 'ES', 'bio' => 'Efren Semilla serves as an Oversight Officer, supporting compliance and organizational standards. His responsibilities include monitoring processes, conducting evaluations, and promoting best practices that strengthen efficiency, accountability, and operational excellence.'],
            ['name' => 'Mzinga Mwinga', 'position' => 'Human Resources Manager', 'photo' => 'team-mzinga-mwinga.png', 'initials' => 'MM', 'bio' => 'Mzinga Mwinga serves as the Human Resources Manager, supporting organizational growth and employee development. The role contributes to HR strategies aligned with company goals, workplace development, and improved operational efficiency.'],
            ['name' => 'Hendrix Harawa', 'position' => 'Safety Officer', 'photo' => 'team-hendrix-harawa.png', 'initials' => 'HH', 'bio' => 'Hendrix Harawa is a dedicated and detail-oriented Safety Officer who plays a key role in ensuring the health, safety, and welfare of YellowQuip personnel. With a proactive approach to hazard identification and risk management, he supports workplace safety across operations.'],
            ['name' => 'Kelvin Sichalwe', 'position' => 'Lumwana Project Manager', 'photo' => 'team-kelvin-sichalwe.jpg', 'initials' => 'KS', 'bio' => 'Kelvin Sichalwe oversees end-to-end project execution across equipment rental, parts, and service support for Lumwana operations. He manages planning, mobilization, day-to-day coordination, stakeholder communication, risk management, and continuous improvement to minimize downtime and support long-term client partnerships.'],
            ['name' => 'Action Banda', 'position' => 'YQL Training Manager', 'photo' => 'team-action-banda.png', 'initials' => 'AB', 'bio' => "Action Banda leads YellowQuip's training initiatives for service and equipment rental operations. He designs onboarding and development programs that reinforce safe work practices, effective equipment handling, and streamlined parts and service processes. He is responsible for students enrolled in different heavy equipment operator programs and supports certification of proficiency in their chosen expertise."],
            ['name' => 'Fanwell Mungala', 'position' => 'Chingola Maintenance Manager', 'photo' => 'team-fanwell-mungala.png', 'initials' => 'FM', 'bio' => 'Fanwell Mungala serves as the Chingola Maintenance Manager, overseeing maintenance operations that support service, equipment rental, and parts programs. He leads preventive and corrective maintenance planning, ensuring equipment is inspected, serviced, and maintained for dependable condition. His work focuses on safety, uptime, cost control, and consistent performance across Chingola operations.'],
        ];

        foreach ($team as $order => $member) {
            TeamMember::create([
                'name' => $member['name'],
                'position' => $member['position'],
                'initials' => $member['initials'],
                'bio' => $member['bio'],
                'photo_path' => $this->copySeedImage('team', $member['photo']),
                'sort_order' => $order,
                'status' => 'active',
            ]);
        }
    }

    private function copySeedImage(string $folder, string $filename): ?string
    {
        $source = public_path("assets/images/{$folder}/{$filename}");

        if (! File::exists($source)) {
            return null;
        }

        $destination = "{$folder}/{$filename}";
        Storage::disk('public')->put($destination, File::get($source));

        return $destination;
    }
}
