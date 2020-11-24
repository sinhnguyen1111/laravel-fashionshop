<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'username'=>'required|min:8|max:20',
            'email'=>'required',
            'password'=>'required|min:8|max:20',
            'status'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'required'=>':attribute không được để trống',
            'min'=>':attribute không được nhỏ hơn :min',
            'max'=>':attribute không được lớn hớn :max'
        ];

    }
    public function attributes(){
        return [
            'username'=>'Tên người dùng',
            'password'=>'Mật khẩu',
            'status'=>'Quyền sử dụng'
        ];
    }
}
