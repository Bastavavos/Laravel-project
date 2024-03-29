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
            'speciality' => 'string|required',
            'history' => 'string|required',
            'email' => 'email|required',
            'address' => 'string|required|max:255',
            'logo' => 'string|required',
            'zip_code' => 'string|required',
            'city' => 'string|required',
            'theme' => 'string|required',
        ];
    }
}
