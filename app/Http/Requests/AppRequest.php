<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AppRequest extends Request
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
            'cate_id'=>'numeric|min:1',
            'image'=>'required',
            'app_url'=>'required',
            'status'=>'required'
        ];
    }

    public function messages(){
        return [
            'cate_id.numeric'=>'Vui lòng chọn loại ứng dụng',
            'cate_id.min'=>'Vui lòng chọn loại ứng dụng',
            'name.required'=>'Vui lòng nhập tiêu đề',
            'image.required'=>'Vui lòng chọn hình ảnh',
            'app_url.required'=>'Vui lòng nhập url tải app',
            'status.required'=>'Vui lòng chọn loại'
        ];
    }
}
