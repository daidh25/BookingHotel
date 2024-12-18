<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProfileUserRequest extends FormRequest
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
        $userId = Auth::user()->id;
        return [
            //
            'first_name' => 'required|string|max:255|min:2',
            'last_name' => 'required|string|max:255|min:2',
            'email' => "required|email|max:255|unique:users,email,$userId",
            'profile_address' => 'string|max:255|min:10',
            'profile_phonenumber' => 'string|max:11|min:10|regex:/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/',
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Vui lòng nhập Firstname',
            'first_name.max' => 'Độ dài Firstname không hợp lệ',
            'first_name.min' => 'Độ dài Firstname không hợp lệ',
            // 'first_name.regex' => 'Firstname không hợp lệ',

            'last_name.required' => 'Vui lòng nhập Lastname',
            'last_name.max' => 'Độ dài Lastname không hợp lệ',
            'last_name.min' => 'Độ dài Lastname không hợp lệ',
            // 'last_name.regex' => 'Lastname không hợp lệ',

            'email.required' => 'Vui lòng nhập email',
            'email.max' => 'Độ dài email vượt quá độ dài cho phép',
            'email.unique' => 'Email đã có người sử dụng',

            'profile_address.max' => 'Độ dài địa chỉ không hợp lệ',
            'profile_address.min' => 'Độ dài địa chỉ không hợp lệ',

            'profile_phonenumber.max' => 'Số điện thoại không hợp lệ',
            'profile_phonenumber.min' => 'Số điện thoại không hợp lệ',
            'profile_phonenumber.regex' => 'Số điện thoại không hợp lệ',
        ];
    }
}
