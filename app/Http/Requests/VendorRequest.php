<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VendorRequest extends FormRequest
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
            'img' => 'required_without:id|mimes:jpg,png,jpeg',
            'name' => 'required|string|max:150',
            'mobile' => 'required',
            'email' => 'nullable|unique:vendor,email',
            'address' => 'required',
            'category_id' => 'required',
        ];
    }

    public function messages()
    {

        return [
            'required' => 'This filled is requierd',
            'unique' => 'This email is used before',
        ];
    }
}
