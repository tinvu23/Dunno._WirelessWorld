<?php

namespace App\Http\Requests\Member;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'username' => 'required|unique:member,username,'.$this -> id,
            'fullname' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Vui long nhap Username',
            'username.unique' => 'Username da ton tai roi',
            'fullname.required' => 'Vui long nhap Fullname',
        ];
    }
}
