<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateTenant extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $id = $this->segment(3);
        
        return [
            'tenant_name' => "required|min:5|max:255|unique:tenants,tenant_name,{$id},id",
            'tenant_cnpj' => ['required', 'digits:14', "unique:tenants,tenant_cnpj,{$id},id"],
            'tenant_email' => ['required', 'min:3', 'max:255', "unique:tenants,tenant_email,{$id},id"],
            'contact' => ['required', 'digits:11'],

            'active' => ['required', 'in:Y,N'],

            // subscription
            'subscription' => ['nullable', 'date'],
            'expires_at' => ['nullable', 'date'],
            'subscription_id' => ['nullable', 'max:255'],
            'subscription_active' => ['nullable', 'boolean'],
            'subscription_suspended' => ['nullable', 'boolean'],
        ];
    }
}
