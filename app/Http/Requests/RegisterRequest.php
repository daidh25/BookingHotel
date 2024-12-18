<?php

namespace App\Http\Requests;

use App\Rules\StringValidRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'username' => ['required', 'unique:users,username', 'regex:/^[a-zA-Z0-9]+$/i', new StringValidRule("Tên đăng nhập")],
            'password' => 'required|min:3|max:30|confirmed',
            'email' => ['required', 'unique:users,email', 'email', 'max:255', 'min:5'],
            'password_confirmation' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'username.unique' => 'Tên đăng nhập đã tồn tại',
            'username.regex' => 'Tên đăng nhập không hợp lệ',
            'password.required' => 'Vui lòng đặt mật khẩu',
            'password.confirmed' => 'Nhập lại mật khẩu không khớp'
        ];
    }
}