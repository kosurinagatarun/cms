<?php

namespace App\Observers;

use App\Models\SubService;
use Illuminate\Support\Str;

class SubServiceObserver
{
    /**
     * Handle the SubService "creating" event.
     *
     * @param  \App\Models\SubService  $subService
     * @return void
     */
    public function creating(SubService $subService)
    {
        $subService->slug = $this->generateUniqueSlug($subService->title);
    }

    /**
     * Handle the SubService "updating" event.
     *
     * @param  \App\Models\SubService  $subService
     * @return void
     */
    public function updating(SubService $subService)
    {
        // Check if title is changed
        if ($subService->isDirty('title')) {
            $subService->slug = $this->generateUniqueSlug($subService->title);
        }
    }

    /**
     * Generate a unique slug for the SubService.
     *
     * @param  string $title
     * @return string
     */
    protected function generateUniqueSlug($title)
    {
        $slug = Str::slug($title);
        $count = SubService::whereRaw("slug RLIKE '^{$slug}(-[0-9]+)?$'")->count();
        return $count ? "{$slug}-{$count}" : $slug;
    }
}
