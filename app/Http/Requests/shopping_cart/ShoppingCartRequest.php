<?php

namespace App\Http\Requests\shopping_cart;

use Illuminate\Foundation\Http\FormRequest;

class ShoppingCartRequest extends FormRequest
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
            'store_id' => 'required',
            'product_id' => 'required',
        ];
    }
}
