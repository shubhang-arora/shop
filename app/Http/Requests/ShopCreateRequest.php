<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ShopCreateRequest extends Request
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
            'shop_name' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'location' => 'required',
            'description' => 'required',
            'password' => 'required',
            'categories' => 'required',
        ];
    }
}
