<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProfile extends FormRequest
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
            'profile_name' => "required|min:3|max:255|unique:profiles,profile_name,{$url},url",
            'profile_desc' => "required|min:3|max:255",
        ];
    }
}
