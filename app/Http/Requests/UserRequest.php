<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class UserRequest extends FormRequest
{
    protected function isEditForm()
    {
        return $this->isMethod('PUT') || $this->isMethod('PATCH');
    }
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ];

        if (!$this->isEditForm()) {
            $rules['email'][] = 'unique:users';
            $rules += [
                'password' => ['required', 'confirmed', Rules\Password::defaults()]
            ];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'The :attribute field is required.',
            'email.required' => 'The :attribute field is required.',
            'email.email' => 'The :attribute must be a valid email address.',
            'email.unique' => 'The :attribute has already been taken.',
            'name.unique' => 'The :attribute has already been taken.',
            'password.required' => 'The :attribute field is required.',
            'password.confirmed' => 'The :attribute confirmation does not match.',
        ];
    }
}
