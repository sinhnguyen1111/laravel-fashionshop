<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class StoreProductRequest extends FormRequest
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
            'name'=>'required|min:8|max:255',
            'origin_price'=>'required|numeric',
            'sale_price'=>'required|numeric',
            'images'=>'required',
            'status'=>'required',
            'parent_id'=>'required'
            
        ];
    }
    public function messages()
    {
        return [
            'required'=>':attribute không được để trống',
            'min'=>':attribute không được nhỏ hơn :min',
            'max'=>':attribute không được lớn hơn :max'
        ];
    }
    public function attributes()
    {
        return [
            'name'=>'Tên sản phẩm',
            'origin_price'=>'Giá gốc',
            'sale_price'=>'Giá bán',
            'images'=>'Ảnh sản phẩm',
            'status'=>'Trạng thái sản phẩm',
            'parent_id'=>'Danh mục'
        ];
    }
}
