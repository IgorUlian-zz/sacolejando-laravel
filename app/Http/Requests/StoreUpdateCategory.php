<?php

namespace App\Http\Requests;
use App\Tenant\Rules\UniqueTenant;
use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateCategory extends FormRequest
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
            
            'category_name' => [
                'required',
                'min:3',
                'max:255',
                new UniqueTenant('categories', $id),
            ],
            'category_desc' => "required|min:3|max:255",
        ];
    }
}
