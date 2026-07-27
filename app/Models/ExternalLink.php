<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExternalLink extends Model
{
    protected $fillable = [
        'title',
        'url',
        'description',
        'category',
        'icon',
        'sort_order',
        'status',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}
