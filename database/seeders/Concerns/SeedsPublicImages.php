<?php

namespace Database\Seeders\Concerns;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

trait SeedsPublicImages
{
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
