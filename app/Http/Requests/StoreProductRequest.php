<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:100'], 
            'description' => ['required', 'string', 'min:10', 'max:1000'],
            'price' => ['required', 'numeric', 'min:0'], 
            'visibility' => ['required', 'string'], 
            'stock' => ['required', 'integer', 'min:0'], 
            'thumbnail' => ['required', 'image', 'mimes:jpeg,png,jpg,gif'],
            'collection.*' => ['image', 'mimes:jpeg,png,jpg,gif'],
        ];
    }
}
