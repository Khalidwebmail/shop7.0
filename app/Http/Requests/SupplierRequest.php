<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends BaseFormRequest
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
            'email'         => 'required|email|unique:suppliers',
            'phone'         => 'required|unique:suppliers',
            'address'       => 'required',
            'photo'         => '',
            'shop_name'     => 'required|unique:suppliers',
        ];
    }

    public function messages()
    {
        return [
            'name.required'         => 'Please give your full name',
            'email.required'        => 'Please give a valid email address',
            'email.unique'          => 'This email address already taken',
            'phone.required'        => 'Please give your phone number',
            'phone.unique'          => 'This phone number already taken',
            'address.required'      => 'Please give valid address',
            'shop_name.required'    => 'Please provide your shop name',
            'shop_name.unique'      => 'Please shop name is already taken',
        ];
    }
}
