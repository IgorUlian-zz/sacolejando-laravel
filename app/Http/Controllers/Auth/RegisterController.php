<?php

namespace App\Http\Controllers\Auth;

use App\Events\TenantCreated;
use App\Http\Controllers\Controller;
use App\Services\TenantService;
use App\Tenant\Events\TenantCreated as EventsTenantCreated;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Validator;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['guest', 'check.selected.plan']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)

    {
        return Validator::make($data, [
            /*'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'min:3', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:6', 'max:16', 'confirmed'],
            'empresa' => ['required', 'string', 'min:3', 'max:255', 'unique:tenants,tenant_cnpj'],
            'cnpj' => ['required', 'numeric', 'digits:14', 'unique:tenants,tenant_cnpj'],*/
        ]);
    }

     /*

    */
    

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        if(!$plan = session('plan')) {
            return redirect()->route('site.home');
        }

        $tenantService = app(TenantService::class);
        
        $user = $tenantService->make($plan, $data);

        event(new EventsTenantCreated($user));

        return $user;
    }
}
