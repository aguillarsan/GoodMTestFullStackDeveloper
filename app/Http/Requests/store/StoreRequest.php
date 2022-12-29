<?php

namespace App\Http\Requests\store;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|max:150',
            'image_store' => 'required',
            'direction' => 'required|max:255',
            'delivery_type_id' => 'required',
            'actual_price' => 'required',
            'old_price' => 'required',
            'opening_hours' => 'required',
            'closing_time' => 'required',
        ];
    }
}
