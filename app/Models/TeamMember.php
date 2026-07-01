<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'position',
        'photo_path',
        'initials',
        'bio',
        'sort_order',
        'status',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }
}
