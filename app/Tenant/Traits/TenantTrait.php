<?php

namespace App\Tenant\Traits;

use App\Tenant\Observers\TenantObserver;
use App\Tenant\Scopes\TenantScope;
use App\Tenant\Scopes\TenantScopes;

trait TenantTrait
{
    /**
     * bootins metodo model
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::observe(TenantObserver::class);
        static::addGlobalScope(new TenantScope);
    }
}