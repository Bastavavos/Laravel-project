<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'string|required|max:255',
            'description' => 'string|required|max:255',
            'price' => 'string',

            'style' => 'required|string',
            'category' => 'required|string',
            'size' => 'required|string',
            'material' => 'string',
            'color' => 'string',
            'stock' => 'string',
            'image' => 'string',
        ];
    }
}
