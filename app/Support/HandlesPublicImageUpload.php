<?php

namespace App\Support;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait HandlesPublicImageUpload
{
    protected array $imageUploadRules = ['nullable', 'image', 'mimes:jpg,jpeg,png,webp,gif', 'max:5120'];

    protected function storePublicImage(UploadedFile $file, string $directory): string
    {
        return $file->store($directory, 'public');
    }

    protected function deletePublicImage(?string $path): void
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}
