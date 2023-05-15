<?php

namespace App\Models\Traits;

use App\Models\Tenant;
use PhpParser\Node\Stmt\Foreach_;

trait UserAdminTraits


//RECEBER AS PEMISSÕES PLANO E CARGO
{
    public function permissions(): array
    {
        $permissionsPlan = $this->permissionsPlan();
        $permissionsRole = $this->permissionsRole();

        //VERIFICAR SE A PERMISSÃO ESTÁ NO ARRAY DE PERMISSÕES
        $permissions = [];
        foreach( $permissionsRole as $permission) {
            if(in_array($permission, $$permissionsPlan))
            array_push($permissions, $permission);
        }

        return $permissions;
    }

//VERIFICAR SE O PLANO CONTEM UMA PERMISSÃO
    public function permissionsPlan(): array
    {
        $tenant = Tenant::with('plan.profiles.permissions')->where('id', $this->tenant_id)->first();
        $plan = $tenant->plan;

        $permissions = [];
        foreach($plan->profiles as $profile){
            foreach($profile->permissions as $permission) {
                array_push($permissions, $permission->permission_name);
            }
        }

        return $permissions;
    }

    //VERIFICAR SE O PLANO CONTEM UMA PERMISSÃO
    public function permissionsRole(): array
    {
        
        $roles = $this->roles()->with('permissions')->get();

        $permissions = [];
            foreach($roles as $role){
                foreach($role->permissions as $permission) {
                    array_push($permissions, $permission->permission_name);
                }
            }

        return $permissions;
    }

    
// RETORNAR SE O USUÁRIO TEM UMA PERMISSÃO
    public function hasPermission(string $permissionName): bool
    {
        return in_array($permissionName, $this->permissions());
    }

// RETORNAR SE USUÁRIO ACESSANDO É ADMIN
    public function isAdmin(): bool
    {
        return in_array($this->email, config('acl.admins'));
    }

// RETORNAR SE USUÁRIO ACESSANDO É RESTAURANTE
    public function isTenant(): bool
    {
        return !in_array($this->email, config('acl.admins'));
    }
}
