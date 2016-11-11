<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class NewsRequest extends Request
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
            'cate_id'=>'numeric|min:1',
            'title'=>'required',
            'image'=>'required',
            'description'=>'required'
        ];
    }

    public function messages(){
        return [
            'cate_id.numeric'=>'Vui lòng chọn loại tin tức',
            'cate_id.min'=>'Vui lòng chọn loại tin tức',
            'title.required'=>'Vui lòng nhập tiêu đề tin',
            'image.required'=>'Vui lòng chọn hình ảnh tin',
            'description.required'=>'Vui lòng nhập mô tả về tin'
        ];
    }
}
