<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ProductRequest extends Request
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
            'name'=>'required',
            'url'=>'required',
            'image'=>'required',
            'price'=>'required',
            'price_company'=>'required',
            'quantity'=>'required|numeric',
            'cate_id'=>'required|numeric'
        ];
    }

    public function messages(){
        return [
            'name.required'=>'Vui lòng nhập tên sản phẩm',
            'url.required'=>'Vui lòng nhập url',
            'image.required'=>'Vui lòng chọn hình ảnh',
            'price.required'=>'Vui lòng chọn nhập giá sản phẩm',
            'price_company.required'=>'Vui lòng chọn nhập giá công ty',
            'quantity.required'=>'Vui lòng chọn nhập số lượng',
            'quantity.numeric'=>'Vui lòng chọn nhập số lượng',
            'cate_id.required'=>'Vui lòng chọn chọn loại sp',
            'cate_id.numeric'=>'Vui lòng chọn chọn loại sp'
        ];
    }
}
