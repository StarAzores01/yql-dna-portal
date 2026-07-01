<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class BlogPostSeeder extends Seeder
{
    /**
     * Ports the posts that used to be hardcoded in
     * resources/views/public/blog.blade.php into the database, so switching
     * that page over to a DB-backed list doesn't lose any existing content.
     */
    public function run(): void
    {
        if (BlogPost::count() > 0) {
            return;
        }

        $posts = [
            ['title' => 'SOP Awareness: Why Standard Procedures Matter', 'image' => 'blog-sop-awareness.jpg', 'excerpt' => 'SOPs help YellowQuip promote safe work, consistent equipment handling, better documentation, and stronger compliance. Controlled SOP files are available only to authorized users through the Member Portal.', 'cta_text' => "Need to know more about YellowQuip's operations or services?", 'cta_label' => 'Contact Us'],
            ['title' => '7 Big Things a Start-Up Must Have to Succeed', 'image' => 'blog-startup-success.jpg', 'excerpt' => 'A strong business needs a clear purpose, reliable systems, disciplined finances, customer focus, skilled people, process control, and continuous improvement.', 'cta_text' => 'Building something that needs reliable equipment or operational support?', 'cta_label' => 'Work With Us'],
            ['title' => '9 Steps to Starting a Business', 'image' => 'blog-starting-business.jpg', 'excerpt' => 'Starting a business requires identifying a real need, planning operations, building the right team, managing resources, serving customers well, and improving every step of the way.', 'cta_text' => 'Partner with a team that understands operations, equipment, and service delivery.', 'cta_label' => 'Become One of Our Partners'],
            ['title' => '10 Rules to Build a Wildly Successful Business', 'image' => 'blog-business-rules.jpg', 'excerpt' => 'Sustainable business success comes from discipline, consistent service, customer value, reliable systems, strong leadership, and long-term trust.', 'cta_text' => 'Let YellowQuip support your next operation or project.', 'cta_label' => 'Start an Inquiry'],
            ['title' => 'YQL DNA Member Repository', 'image' => 'blog-yql-dna-member-repository.jpg', 'excerpt' => "YQL DNA is YellowQuip's controlled digital repository for authorized users. It supports SOP access, compliance records, training references, and operational documentation.", 'note' => 'This repository is not open for public registration. Access is reserved for approved YellowQuip staff, managers, auditors, and administrators.', 'cta_text' => 'For partnership, service, rental, training, or platform-related inquiries, contact YellowQuip.', 'cta_label' => 'Contact the Team'],
            ['title' => 'Safety First, Excellence Always', 'image' => 'blog-safety-excellence.jpg', 'excerpt' => 'At YellowQuip, safety is not just a checklist. It is a culture supported by inspections, training, clean audits, hazard reporting, and zero-incident goals.', 'cta_text' => 'Work with a team that values safety and quality.', 'cta_label' => 'Connect With Us'],
            ['title' => 'Smart Pricing and Tiered Rental Packages', 'image' => 'blog-smart-pricing-rentals.jpg', 'excerpt' => 'Smart pricing helps rental companies adjust rates based on demand, equipment type, duration, urgency, and service value. Tiered packages can help customers choose the level of support they need.', 'cta_text' => "Ask about YellowQuip's rental options and support packages.", 'cta_label' => 'Ask About Rentals'],
        ];

        foreach ($posts as $i => $post) {
            BlogPost::create([
                'title' => $post['title'],
                'slug' => BlogPost::uniqueSlugFrom($post['title']),
                'image_path' => $this->copySeedImage('blog', $post['image']),
                'excerpt' => $post['excerpt'],
                'note' => $post['note'] ?? null,
                'cta_text' => $post['cta_text'] ?? null,
                'cta_label' => $post['cta_label'] ?? null,
                'cta_url' => route('public.contact'),
                'status' => 'published',
                'published_at' => now()->subDays($i),
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
