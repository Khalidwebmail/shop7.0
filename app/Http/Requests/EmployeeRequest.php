<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends BaseFormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'          => 'required',
            'email'         => 'required|email|unique:employees',
            'phone'         => 'required|unique:employees',
            'address'       => 'required',
            'salary'        => 'required',
            'photo'         => '',
            'nid'           => 'required|unique:employees',
            'joining_date'  => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'   => 'Please give your full name',
            'email.required'  => 'Please give a valid email address',
            'email.unique'    => 'This email address already taken',
            'phone.required'  => 'Please give your phone number',
            'phone.unique'    => 'This phone number already taken',
            'salary.required' => 'Please give a salary amount',
            'nid.required'    => 'Please give nid number',
            'nid.unique'      => 'Please give nid number is already taken',
        ];
    }
}
