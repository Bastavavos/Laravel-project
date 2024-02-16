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
            'name' => 'string|required|max:255',
            'description' => 'string|required|max:255',
            'price' => 'decimal:2',
            'category' => 'string',
            'material' => 'string',
            'style' => 'string',
            'color' => 'string',
            'stock' => 'int|required',
            'image' => 'image',

            'height' => 'decimal:2',
            'width' => 'decimal:2',
            'depth' => 'decimal:2',
            'capacity' => 'decimal:2',
        ];
    }
}
