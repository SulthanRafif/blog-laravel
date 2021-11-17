<?php

namespace App\Observers;

use App\Models\Blog;
use Illuminate\Support\Facades\Log;

class BlogObserver
{
    /**
     * Handle the Blog "created" event.
     *
     * @param  \App\Models\Blog  $blog
     * @return void
     */
    public function creating(Blog $blog)
    {
        Log::info("Creating Observer Method Is Firing " . $blog);
    }

    public function created(Blog $blog)
    {
        Log::info("Created Observer Method Is Firing " . $blog);

    }

    /**
     * Handle the Blog "updated" event.
     *
     * @param  \App\Models\Blog  $blog
     * @return void
     */
    public function updated(Blog $blog)
    {
        Log::info("Updated Observer Method Is Firing " . $blog);

    }

    /**
     * Handle the Blog "deleted" event.
     *
     * @param  \App\Models\Blog  $blog
     * @return void
     */
    public function deleted(Blog $blog)
    {
        Log::info("Deleted Observer Method Is Firing " . $blog);

    }

    /**
     * Handle the Blog "restored" event.
     *
     * @param  \App\Models\Blog  $blog
     * @return void
     */
    public function restored(Blog $blog)
    {
        //
    }

    /**
     * Handle the Blog "force deleted" event.
     *
     * @param  \App\Models\Blog  $blog
     * @return void
     */
    public function forceDeleted(Blog $blog)
    {
        //
    }
}
