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
            'mobile' => 'required|unique:vendor' . ',id,',
            'email' => 'required|email|unique:vendor' . ',id,',
            'address' => 'required',
            'category_id' => 'required|exists:main_categories,id',
        ];
    }

    public function messages()
    {

        return [
            'required' => 'This filled is requierd',
            'category_id:exists' => 'This category is wrong',
            'email.unique' => 'This email is used before',
            'mobile.unique' => 'This number is used before',
        ];
    }
}
