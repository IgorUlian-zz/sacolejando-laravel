<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePlan extends FormRequest
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
        $url = $this->segment(3);
        return [
            'plan_name' => "required|min:4|max:50|unique:plans,plan_name,{$url},url",
            'plan_price' => "required|regex:/^\d+(\.\d{1,2})?$/",
            'plan_desc' => "required|min:6|max:255",

        ];
    }
}
