<?php

namespace Database\Seeders;

use App\Models\GalleryItem;
use Database\Seeders\Concerns\SeedsPublicImages;
use Illuminate\Database\Seeder;

class GalleryItemSeeder extends Seeder
{
    use SeedsPublicImages;

    /**
     * Ports the items that used to be hardcoded in
     * resources/views/public/project-gallery.blade.php into the database,
     * so switching that page over to a DB-backed list doesn't lose any
     * existing content.
     */
    public function run(): void
    {
        if (GalleryItem::count() > 0) {
            return;
        }

        $items = [
            ['category' => 'heavy-equipment-maintenance', 'title' => 'Equipment Maintenance Work', 'description' => 'Public showcase of YellowQuip equipment maintenance and service support.', 'folder' => 'gallery/maintenance', 'image' => 'gallery-heavy-equipment-maintenance-01.png'],
            ['category' => 'heavy-equipment-maintenance', 'title' => 'Scheduled Servicing', 'description' => 'Technicians performing scheduled servicing on heavy equipment components.', 'folder' => 'gallery/maintenance', 'image' => 'gallery-heavy-equipment-maintenance-02.png'],
            ['category' => 'parts-mining-equipment-supplier', 'title' => 'Parts Supply Operations', 'description' => 'Genuine parts and mining equipment supply for underground and open-pit operations.', 'folder' => 'gallery/equipment', 'image' => 'gallery-parts-mining-equipment-01.png'],
            ['category' => 'parts-mining-equipment-supplier', 'title' => 'Equipment Supply', 'description' => 'Genuine equipment supply supporting mining and construction operations.', 'folder' => 'gallery/equipment', 'image' => 'gallery-equipment-supply-01.png'],
            ['category' => 'parts-mining-equipment-supplier', 'title' => 'Open-Pit Mining Equipment', 'description' => 'Equipment supply and support for open-pit mining operations.', 'folder' => 'gallery/equipment', 'image' => 'gallery-mining-equipment-openpit-01.png'],
            ['category' => 'parts-mining-equipment-supplier', 'title' => 'Underground Mining Equipment', 'description' => 'Equipment supply and support for underground mining operations.', 'folder' => 'gallery/equipment', 'image' => 'gallery-mining-equipment-underground-01.png'],
            ['category' => 'earthmoving-mining-jobs', 'title' => 'Earthmoving Operations', 'description' => 'Trained teams delivering earthmoving and mining-related works on active sites.', 'folder' => 'gallery/field', 'image' => 'gallery-earthmoving-mining-jobs-01.jpg'],
            ['category' => 'earthmoving-mining-jobs', 'title' => 'Field Operation', 'description' => 'YellowQuip crews delivering practical site support on active project sites.', 'folder' => 'gallery/field', 'image' => 'gallery-field-operation-01.jpg'],
            ['category' => 'earthmoving-mining-jobs', 'title' => 'Site Work', 'description' => 'On-site earthmoving and mining-related work delivered by trained crews.', 'folder' => 'gallery/field', 'image' => 'gallery-site-work-01.jpg'],
            ['category' => 'apprenticeship-training', 'title' => 'Apprenticeship Training Activity', 'description' => 'Hands-on apprenticeship training developing the next generation of technicians.', 'folder' => 'gallery/apprenticeship', 'image' => 'gallery-apprenticeship-training-01.jpg'],
            ['category' => 'apprenticeship-training', 'title' => 'Apprenticeship Training Activity', 'description' => 'Continued hands-on apprenticeship training developing technical skills.', 'folder' => 'gallery/apprenticeship', 'image' => 'gallery-apprenticeship-training-02.jpg'],
            ['category' => 'operators-training', 'title' => 'Operator Training Activity', 'description' => 'Training activity focused on safe and effective heavy equipment operation.', 'folder' => 'gallery/operators', 'image' => 'gallery-operators-training-01.jpg'],
            ['category' => 'operators-training', 'title' => 'Operator Training Session', 'description' => 'Operators building proficiency across heavy equipment classes.', 'folder' => 'gallery/operators', 'image' => 'gallery-operators-training-02.jpg'],
            ['category' => 'operators-training', 'title' => 'Heavy Equipment Operator Training', 'description' => 'Practical heavy equipment operator training focused on safe handling.', 'folder' => 'gallery/operators', 'image' => 'gallery-heavy-equipment-operator-training-01.jpg'],
            ['category' => 'artisan-training', 'title' => 'Artisan Skills Development', 'description' => 'Hands-on artisan training aligned with technical work and equipment servicing needs.', 'folder' => 'gallery/artisan', 'image' => 'gallery-artisan-training-01.jpg'],
            ['category' => 'artisan-training', 'title' => 'Artisan Skills Development', 'description' => 'Continued artisan training in support of equipment servicing and repair.', 'folder' => 'gallery/artisan', 'image' => 'gallery-artisan-training-02.jpg'],
            ['category' => 'repair-service-overhaul', 'title' => 'Component Overhaul', 'description' => 'Rehabilitation, repair, servicing, and overhaul of heavy equipment components.', 'folder' => 'gallery/maintenance', 'image' => 'gallery-repair-service-overhaul-01.png'],
            ['category' => 'repair-service-overhaul', 'title' => 'Component Overhaul', 'description' => 'Overhaul of heavy equipment components to restore operational condition.', 'folder' => 'gallery/maintenance', 'image' => 'gallery-component-overhaul-01.png'],
            ['category' => 'repair-service-overhaul', 'title' => 'Completed Works', 'description' => "A finished service outcome from YellowQuip's equipment maintenance and repair work.", 'folder' => 'gallery/completed', 'image' => 'gallery-completed-work-01.jpg'],
        ];

        foreach ($items as $order => $item) {
            GalleryItem::create([
                'title' => $item['title'],
                'category' => $item['category'],
                'description' => $item['description'],
                'image_path' => $this->copySeedImage($item['folder'], $item['image']),
                'sort_order' => $order,
                'status' => 'active',
            ]);
        }
    }
}
