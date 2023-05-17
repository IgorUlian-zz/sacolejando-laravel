<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateFood extends FormRequest
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
            'food_name' => "required|min:3|max:255|unique:foods,food_name,{$id},id",
            'food_desc' => "required|min:3|max:255",
            'price' => "required"
        ];
    }
}
