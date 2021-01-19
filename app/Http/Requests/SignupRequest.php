<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed'
        ];
    }

    public function messages()
    {
        return[
            'name.required' => 'Please provide your name',
            'name.email' => 'Please provide your email',
            'email.unique' => 'This email address is already taken',
            'password.required' => 'Please provide password',
            'password.min' => 'Please provide at least 8 char password',
        ];
    }
}
