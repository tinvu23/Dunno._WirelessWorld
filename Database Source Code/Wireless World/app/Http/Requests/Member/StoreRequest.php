<?php

namespace App\Http\Requests\Member;

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
            'username' => 'required|unique:member',
            'password' => 'required',
            'fullname' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Please enter Username',
            'username.unique' => 'Username already exists',
            'password.required' => 'Please enter Password',
            'fullname.required' => 'Please enter Full Name',
        ];
    }
}
