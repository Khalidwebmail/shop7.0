<?php

namespace App\Http\Requests;

class SigninRequest extends BaseFormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => 'required|email|exists:users',
            'password' => 'required|min:8'
        ];
    }

    public function messages()
    {
        return[
            'email.required' => 'Please give your email address',
            'password' => 'Please provide password'
        ];
    }
}
