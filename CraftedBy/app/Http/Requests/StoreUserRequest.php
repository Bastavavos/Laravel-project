<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'firstname' => 'string|required|max:255',
            'lastname' => 'string|required|max:255',
            'email' => 'email|required|unique:users',
            'address' => 'string|required|max:255',

            'password' => 'required|string|min:8',

            'zip_code'  => 'required|string',
            'city'      => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'lastname.required' => 'lastname field is required.',
            'lastname.string' => 'lastname field must be a string.',
            'lastname.max' => 'lastname field must not exceed 255 characters.',

            'firstname.required' => 'firstname field is required.',
            'firstname.string' => 'firstname field must be a string.',
            'firstname.max' => 'firstname field must not exceed 255 characters.',

            'email.required' => 'email field is required.',
            'email.email' => 'Please enter a valid email.',
            'email.unique' => 'email address is already used.',

            'password.required' => 'password field is required.',
            'password.string' => 'password field must be a string.',
            'password.min' => 'password must be at least 8 characters long.',
            'password.confirmed' => 'password confirmation does not match.',

            'address.required' => 'address field is required.',
            'address.string' => 'address field must be a string.',
            'address.max' => 'address field must not exceed 255 characters.',

            'zip_code.required' => 'zip code field is required.',
            'zip_code.integer' => 'zip code field must be an integer.',
            'zip_code.max' => 'zip code field must not exceed 5 numbers.',

            'city.required' => 'city field is required.',
            'city.string' => 'city field must be a string.',
            'city.max' => 'city field must not exceed 255 characters.',
        ];
    }
}
