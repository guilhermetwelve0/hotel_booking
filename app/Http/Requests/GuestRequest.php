<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuestRequest extends FormRequest
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
            'email' => ['string', 'email', 'max:255'],
            'phone' => ['numeric'],
        ];

        if (!$this->isEditForm()) {
            $rules['email'][] = 'unique:guests';
            $rules['phone'][] = 'unique:guests';
        }

        return $rules;
    }

    public function messages(): array
    {
        return [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a string.',
            'name.max' => 'The name may not be greater than :max characters.',
            'email.string' => 'The email must be a string.',
            'email.email' => 'Invalid email format.',
            'email.max' => 'The email may not be greater than :max characters.',
            'email.unique' => 'The email is already taken.',
            'phone.numeric' => 'The phone must be a number.',
            'phone.unique' => 'The phone is already registered.',
        ];
    }
}
