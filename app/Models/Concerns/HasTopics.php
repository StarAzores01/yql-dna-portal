<?php

namespace App\Models\Concerns;

trait HasTopics
{
    /**
     * The `topics` column stores freeform, comma-separated tags (e.g.
     * "Safety, Training, ISO"). This splits it into a clean array for
     * display and filtering — no separate topics table to manage.
     */
    public function topicsList(): array
    {
        if (empty($this->topics)) {
            return [];
        }

        return collect(explode(',', $this->topics))
            ->map(fn ($topic) => trim($topic))
            ->filter()
            ->values()
            ->all();
    }
}
