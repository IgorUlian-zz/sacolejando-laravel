<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateOrder extends FormRequest
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
            'token_company' => [
                'required',
                'exists:tenants,uuid',
            ],
            'foods' => ['required'],
            'foods.*.identify' => ['required', 'exists:foods,uuid'],
            'foods.*.quantity' => ['required', 'integer'] ,
        ];

    }
}
