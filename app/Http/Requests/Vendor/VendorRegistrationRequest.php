<?php

namespace App\Http\Requests\Vendor;

use Illuminate\Foundation\Http\FormRequest;

class VendorRegistrationRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|unique:vendor',
            'mobile' => 'required|unique:vendor',
            'email' => 'required|email|unique:vendor',
            'address' => 'required',
        ];
    }


    public function messages()
    {
        return [
            'required' => 'This filled is requierd',
            'name.unique' => 'This name is used before',
            'email.unique' => 'This email is used before',
            'mobile.unique' => 'This number is used before',
        ];
    }
}
