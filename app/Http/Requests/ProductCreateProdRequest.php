<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateProdRequest extends FormRequest
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
            'name' => 'required|unique|string|max:255',
            'description' => 'required|string',
            'price' => 'required|decimal:0,2|gte:0',
            'quantity' => 'required|integer|gte:0',
            'image' => 'required|image|mimes:jpg,png,jpeg|min:2|max:2000'
        ];
    }
}
