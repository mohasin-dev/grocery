<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'name'         => 'required',
            'description'  => 'required',
            'excerpt'      => 'required',
            'price'        => 'required',
            'brand_id'     => 'required',
            'category_id'  => 'required',
            'unit_id'      => 'required',
            'types'        => 'required',
            'nutritions'   => 'required',
            'store_id'     => 'required',
            'currency_id'  => 'required',
        ];
    }
}