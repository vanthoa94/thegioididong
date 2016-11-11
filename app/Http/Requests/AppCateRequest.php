<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AppCateRequest extends Request
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
            'parent'=>'numeric|min:0'
        ];
    }

    public function messages(){
        return [
            'name.required'=>'Vui lòng nhập tên loại ứng dụng',
            'url.required'=>'Vui lòng nhập url',
            'parent.numeric'=>'Vui lòng chọn loại ứng dụng cha',
            'parent.min'=>'Vui lòng chọn loại ứng dụng cha'
        ];
    }
}
