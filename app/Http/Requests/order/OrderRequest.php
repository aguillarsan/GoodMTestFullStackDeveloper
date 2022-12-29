<?php

namespace App\Http\Requests\order;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => 'required',
            'store_id' => 'required',
            'delivery_type_id' => 'required',
            'order_number' => 'required',
            'total_amount' => 'required',
        ];
    }
}
