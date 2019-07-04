<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WebpageStore extends FormRequest
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
        $rules = [];

        $rules['product_name'] = 'required|max:100';
        $rules['quantity'] = 'required|numeric|min:1';
        $rules['price'] = 'required|regex:/^\d+(\.\d{1,2})?$/';
        
        return $rules;
    }
}
