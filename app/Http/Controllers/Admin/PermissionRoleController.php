<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;

class PermissionRoleController extends Controller
{
    protected $role, $permission;

    public function __construct(Role $role, Permission $permission)
    {
        $this->role = $role;
        $this->permission = $permission;

            }

    public function permissions($idProfile)
    {   
        $role  = $this->role->find($idProfile);

        if(!$role){
            return redirect()->back();
        }

        $permissions = $role->permissions()->paginate();

        return view('admin.pages.roles.permissions.permissions', compact('role', 'permissions'));

   }

       public function roles($idPermission)
    {   
        if(!$permission = $this->permission->find($idPermission))
        {
            return redirect()->back();
        }

        $roles = $permission->roles()->paginate();

        return view('admin.pages.permissions.roles.roles', compact('permission', 'roles'));

   }

   public function permissionsAvailable(Request $request, $idProfile)
   {   

        if(!$role = $this->role->find($idProfile))
        {
            return redirect()->back();
        }

        $filters = $request->except('_token');

        $permissions = $role->permissionsAvailable($request->filter);

        return view('admin.pages.roles.permissions.available', compact('role', 'permissions', 'filters'));

   }

   public function attachPermissionsProfile(Request $request, $idProfile)
   {   

        if(!$role = $this->role->find($idProfile))
        {
            return redirect()->back();
        }

        
        if (!$request->permissions || count($request->permissions) == 0) {
            return redirect()
                        ->back()
                        ->with('info', 'Precisa escolher pelo menos uma permissão');
        }

        $role->permissions()->attach($request->permissions);

        return redirect()->route('roles.permissions', $role->id);
    }

    public function detachPermissionsProfile($idProfile, $idPermission)
    {      

        $role = $this->role->find($idProfile);
        $permission = $this->permission->find($idPermission);

         if(!$role || !$permission)
         {
             return redirect()->back();
         }
 
         $role->permissions()->detach($permission);
 
         return redirect()->route('roles.permissions', $role->id);
     }

}
