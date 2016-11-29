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
            'cate_id'=>'required|numeric'
        ];
    }

    public function messages(){
        return [
            'name.required'=>'Vui lòng nhập tên sách',
            'url.required'=>'Vui lòng nhập url',
            'image.required'=>'Vui lòng chọn hình ảnh',
            'price.required'=>'Vui lòng chọn nhập giá sách. Để 0 nếu là miễn phí',
            'cate_id.required'=>'Vui lòng chọn chọn loại sách',
            'cate_id.numeric'=>'Vui lòng chọn chọn loại sách'
        ];
    }
}
