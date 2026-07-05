<?php

namespace App\Models;

use App\Models\Concerns\HasTopics;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryItem extends Model
{
    use HasFactory, HasTopics;

    protected $fillable = [
        'title',
        'category',
        'description',
        'image_path',
        'topics',
        'sort_order',
        'status',
        'created_by',
    ];

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function categoryLabel(): string
    {
        return config('gallery_categories.'.$this->category, $this->category);
    }
}
