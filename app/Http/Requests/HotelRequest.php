<?php

namespace App\Http\Requests;

use App\Rules\FileImageValidRule;
use App\Rules\StringValidRule;
use App\Rules\UnsignedIntRule;
use Illuminate\Foundation\Http\FormRequest;

class HotelRequest extends FormRequest
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
            'name' => ['required', new StringValidRule("Tên khách sạn")],
            'city' => ['required', new StringValidRule("Thành phố")],
            'country' => ['required_with:city', new StringValidRule("Quốc gia")],
            'description' => 'required|string|max:2500|min:2',
            'check_in_date' => 'required|date',
            'price' => ['required', new UnsignedIntRule(0, "Giá thuê")],
            'num_guest' => ['required', new UnsignedIntRule(0, "Số lượng khách")],
            'image' => ['array', new FileImageValidRule]
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Vui lòng nhập tên khách sạn',
            'name.unique' => 'Tên khách sạn đã tồn tại',
            'city.required' => 'Vui lòng nhập thành phố',
            'country.required_with' => 'Vui lòng nhập quốc gia',
            'description.required' => 'Vui lòng mô tả khách sạn',
            'description.max' => "Mô tả quá dài",
            'description.min' => "Mô tả quá ngắn",
            'check_in_date.required' => 'Vui lòng nhập ngày có thể đặt phòng',
            'price.required' => 'Vui lòng nhập giá phòng',
            'num_guest.required' => 'Vui lòng nhập số lượng khách',
            'image.required' => 'Vui lòng upload ảnh',
        ];
    }
}
