<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
            'num_guests' => 'required|integer|gt:0',
        ];
    }

    public function messages()
    {
        return [
            'num_guests.required' => 'Số lượng khách không hợp lệ',
            'num_guests.integer' => 'Số lượng khách phải là số nguyên',
            'num_guests.gt' => 'Số lượng khách phải là số nguyên lớn hơn 0',
        ];
    }
}
