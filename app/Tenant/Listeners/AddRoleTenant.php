<?php

namespace App\Tenant\Listeners;

use App\Events\TenantCreated;
use App\Models\Role;
use App\Models\Tenant;
use App\Tenant\Events\TenantCreated as EventsTenantCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AddRoleTenant
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(EventsTenantCreated $event)
    {
        $user = $event->user();

        if(!$role = Role::first())
            return;

            $user->roles()->attach($role);

            return 1;
        }
}
