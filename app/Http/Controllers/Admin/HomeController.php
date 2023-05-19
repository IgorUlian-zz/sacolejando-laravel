<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Food;
use App\Models\Permission;
use App\Models\Plan;
use App\Models\Profile;
use App\Models\Role;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){

        $tenant = auth()->user()->tenant;

        $totalUsers = User::count();
        $totalCategories = Category::count();
        $totalFoods = Food::count();
        $totalTenants = Tenant::count();
        $totalPlans = Plan::count();
        $totalRoles = Role::count();
        $totalProfiles = Profile::count();
        $totalPermissions = Permission::count();

        return view('admin.pages.home.index', compact(
            'totalUsers',
            'totalCategories',
            'totalFoods',
            'totalTenants',
            'totalPlans',
            'totalRoles',
            'totalProfiles',
            'totalPermissions'
        ));
    }
}
