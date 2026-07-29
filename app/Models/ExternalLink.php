<?php

namespace App\Models;

use App\Models\Concerns\HasTopics;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ExternalLink extends Model
{
    use HasFactory, HasTopics;

    protected $fillable = [
        'title',
        'display_title',
        'slug',
        'category',
        'url',
        'link_label',
        'icon',
        'logo_path',
        'excerpt',
        'full_description',
        'content',
        'note',
        'topics',
        // Company Overview
        'headquarters',
        'employee_count',
        'main_products',
        'industry',
        'country',
        'website_url',
        // Ownership and Control
        'controlling_shareholder',
        'controlling_shareholder_percentage',
        'ultimate_controller',
        'ultimate_controller_percentage',
        'company_nature',
        // Governance Structure
        'chairman',
        'ceo',
        'key_directors',
        'governance_notes',
        // SEO / Metadata
        'meta_title',
        'meta_description',
        'sort_order',
        'status',
        'created_by',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    /**
     * The public-facing name — falls back to the full company/title when
     * no shorter display title has been set.
     */
    public function displayName(): string
    {
        return $this->display_title ?: $this->title;
    }

    /**
     * The link used for the public "Visit" button — external_url first,
     * falling back to the informational website_url from the Company
     * Overview section.
     */
    public function primaryUrl(): ?string
    {
        return $this->url ?: $this->website_url;
    }

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'published');
    }

    public static function uniqueSlugFrom(string $title, ?int $ignoreId = null): string
    {
        $base = Str::slug($title) ?: 'link';
        $slug = $base;
        $suffix = 2;

        while (
            static::where('slug', $slug)
                ->when($ignoreId, fn ($query) => $query->where('id', '!=', $ignoreId))
                ->exists()
        ) {
            $slug = $base.'-'.$suffix++;
        }

        return $slug;
    }
}
