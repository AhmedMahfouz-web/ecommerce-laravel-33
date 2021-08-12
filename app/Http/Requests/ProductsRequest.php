<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required|exists:main_categories,id',
            // 'vendor_id' => 'required|exists:vendor,id',
            'qty' => 'required|numeric',
            'current_price' => 'required|numeric',
            'old_price' => 'numeric',
        ];
    }
}
