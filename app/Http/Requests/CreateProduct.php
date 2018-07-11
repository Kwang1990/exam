<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProduct extends FormRequest
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
            //
            'product_name' => 'required|string|max:255|unique:product,id,'.$this->segment(2),
            'product_sku' => 'required|string|max:255',
            'product_price' => 'required|integer',
            'category_id' => 'required|integer|max:255',
            'Product_image' => '|image'
        ];
    }
}
