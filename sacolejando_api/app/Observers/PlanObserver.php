<?php

namespace App\Observers;

use App\Models\Plan;
use Illuminate\Support\Str;

class PlanObserver
{
    /**
     * Handle the Plan "creating" event.
     *
     * @param  \App\Models\Plan  $plans
     * @return void
     */
    public function creating(Plan $plans)
    {
        $plans->url = Str::kebab($plans->plan_name);

    }

    /**
     * Handle the Plan "updated" event.
     *
     * @param  \App\Models\Plan  $plans
     * @return void
     */
    public function updating(Plan $plans)
    {
        $plans->url = Str::kebab($plans->plans_name);
    }

    /**
     * Handle the Plan "deleted" event.
     *
     * @param  \App\Models\Plan  $plans
     * @return void
     */
    public function deleted(Plan $plans)
    {
        //
    }

    /**
     * Handle the Plan "restored" event.
     *
     * @param  \App\Models\Plan  $plans
     * @return void
     */
    public function restored(Plan $plans)
    {
        //
    }

    /**
     * Handle the Plan "force deleted" event.
     *
     * @param  \App\Models\Plan  $plans
     * @return void
     */
    public function forceDeleted(Plan $plans)
    {
        //
    }
}
