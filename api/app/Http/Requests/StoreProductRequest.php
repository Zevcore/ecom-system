<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:255',
            'description' => 'required|min:3',
            'images' => 'required|json',
            'stock' => "required|integer",
            'specifications' => 'required|json',
            'basePrice' => 'required',
            'discountPercent' => 'required|integer',
            'manufacturer' => 'required|min:3|max:255'
        ];
    }
}
