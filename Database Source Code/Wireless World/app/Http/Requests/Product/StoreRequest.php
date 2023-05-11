<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            
            'name' => 'required|unique:product',
            'price' => 'required',
            'image' => 'required',
            'category_id' => 'required',
            'brand_id' => 'required',
            'intro' => 'required',
            'desc' => 'required'
            
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter name',
            'name.unique' => 'Name already exists',
            'price.required' => 'Please enter price',
            'category_id' => 'Please select category',
            'brand_id' => 'PLease select brand',
            'intro' => 'Please enter intro',
            'desc' => 'Please enter description',
        ];
    }
}
