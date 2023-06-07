<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateClient extends FormRequest
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
        return [
            'client_name' => ['required', 'string', 'max:50'],
            'client_email' => ['required', 'string', 'email', 'max:25', "unique:clients"],
            'password' => ['required', 'string', 'min:6'],
            'contact' => ['required', 'digits:11']
        ];
    }
}
