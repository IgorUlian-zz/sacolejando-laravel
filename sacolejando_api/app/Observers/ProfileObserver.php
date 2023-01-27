<?php

namespace App\Observers;

use App\Models\Profile;
use Illuminate\Support\Str;

class ProfileObserver
{
    /**
     * Handle the Profile "creating" event.
     *
     * @param  \App\Models\Profile  $profile
     * @return void
     */
    public function creating(Profile $profile)
    {
        $profile->url = Str::kebab($profile->profile_name);
    }

    /**
     * Handle the Profile "updating" event.
     *
     * @param  \App\Models\Profile  $profile
     * @return void
     */
    public function updating(Profile $profile)
    {
        $profile->url = Str::kebab($profile->profile_name);
    }

    /**
     * Handle the Profile "deleted" event.
     *
     * @param  \App\Models\Profile  $profile
     * @return void
     */
    public function deleted(Profile $profile)
    {
        //
    }

    /**
     * Handle the Profile "restored" event.
     *
     * @param  \App\Models\Profile  $profile
     * @return void
     */
    public function restored(Profile $profile)
    {
        //
    }

    /**
     * Handle the Profile "force deleted" event.
     *
     * @param  \App\Models\Profile  $profile
     * @return void
     */
    public function forceDeleted(Profile $profile)
    {
        //
    }
}
