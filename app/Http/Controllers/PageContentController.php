<?php

namespace App\Http\Controllers;

use App\Models\PageContent;
use App\Services\AuditLogService;
use App\Support\HandlesPublicImageUpload;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PageContentController extends Controller
{
    use HandlesPublicImageUpload;

    public function edit(string $page)
    {
        $fields = $this->fieldsFor($page);
        $existing = PageContent::forPage($page);

        return view('pages.edit', ['page' => $page, 'fields' => $fields, 'existing' => $existing]);
    }

    public function update(Request $request, string $page)
    {
        $fields = $this->fieldsFor($page);

        foreach ($fields as $field) {
            $key = $field['key'];

            if ($field['type'] === 'image') {
                if ($request->hasFile($key)) {
                    $request->validate([$key => $this->imageUploadRules]);

                    $current = PageContent::where('page', $page)->where('key', $key)->first();
                    $this->deletePublicImage($current?->value);

                    $path = $this->storePublicImage($request->file($key), 'pages');
                    PageContent::updateOrCreate(['page' => $page, 'key' => $key], ['value' => $path]);
                }

                continue;
            }

            $value = $request->validate([$key => ['nullable', 'string', $field['type'] === 'text' ? 'max:255' : 'max:5000']])[$key] ?? '';
            PageContent::updateOrCreate(['page' => $page, 'key' => $key], ['value' => $value]);
        }

        AuditLogService::log($request->user()->id, 'page_content_update', 'Updated page content for "' . $page . '"', $request);

        return redirect()->route('admin.pages.edit', $page)->with('success', 'Page content updated.');
    }

    private function fieldsFor(string $page): array
    {
        $fields = config('page_content.' . $page);

        abort_if($fields === null, Response::HTTP_NOT_FOUND);

        return $fields;
    }
}
