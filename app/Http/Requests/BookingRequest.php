<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules()
    {
        return [
            'total' => ['required', 'numeric', 'min:0'],
            'guest_id' => ['required', 'uuid'],
            'check_in_date' => ['required', 'date'],
            'check_out_date' => ['required', 'date', 'after_or_equal:check_in_date'],
            'type' => ['required', 'in:web,call,counter'],
            // 'status' => ['required', 'integer', 'in:0,1,2,3,4'],
        ];
    }

    public function messages()
    {
        return [
            'total.required' => 'The total field is required.',
            'guest_id.required' => 'The guest field is required.',
            'check_in_date.required' => 'The check-in date field is required.',
            'check_out_date.required' => 'The check-out date field is required.',
            'check_out_date.after_or_equal' => 'The check-out date must be after or equal to the check-in date.',
            'type.required' => 'The booking type is required.',
            'type.in' => 'The selected type is invalid.',
            'status.required' => 'The status field is required.',
        ];
    }

}
