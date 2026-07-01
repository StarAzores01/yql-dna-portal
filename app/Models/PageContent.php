<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    protected $fillable = [
        'page',
        'key',
        'value',
    ];

    public static function forPage(string $page): array
    {
        return static::where('page', $page)->pluck('value', 'key')->all();
    }
}
