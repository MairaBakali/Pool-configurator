<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreConfiguratorRequest extends FormRequest
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
            'shop_url' => 'required|max:255',
            'user_name' => 'required|max:255',
            'api_key' => 'required|max:255',
            'category_url_1' => 'required',
            'category_url_2' => 'required',
            'category_url_3' => 'required'
        ];
    }
}
