<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MenuRequest extends Request
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
            'parent_id'=>'numeric|min:0'
        ];
    }

    public function messages(){
        return [
            'name.required'=>'Vui lòng nhập tên menu',
            'url.required'=>'Vui lòng nhập url',
            'parent_id.numeric'=>'Vui lòng chọn menu cha',
            'parent_id.min'=>'Vui lòng chọn menu cha'
        ];

    }
}
