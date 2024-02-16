<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBusinessRequest extends FormRequest
{
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
            'history' => 'string|required',
            'email' => 'email|required',
            'address' => 'string|required|max:255',

            'zip_code' => 'string|required|max:5',
            'city' => 'string|required|max:255',
//            'layer' => '',
            'color_1' => 'hex_color',
            'color_2' => 'hex_color'
        ];
    }

//    public function messages()
//    {
//        return [
//            'name.required' => 'name of business is required',
//            'name.string' => 'name must be a string',
//
//            'description.required' => 'description of business is required',
//            'description.string' => 'description must be a string',
//
//            'history.required' => 'history of business is required',
//            'history.string' => 'history must be a string',
//        ];
//    }
}
