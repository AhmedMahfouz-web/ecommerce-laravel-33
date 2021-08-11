<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubCategoryRequest extends FormRequest
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
            'photo' => 'required_without:id|mimes:jpg,png,jpeg',
            'category' => 'required|array|min:1',
            'main_category_id' => 'required|exists:main_categories,id',
            'category.*.name' => 'required',
            'category.*.translation_lang' => 'required'
        ];
    }

    public function messages()
    {

        return [
            'required' => 'This filled is requierd',
            'main_category_id:exists' => 'This main category is wrong',
        ];
    }
}
