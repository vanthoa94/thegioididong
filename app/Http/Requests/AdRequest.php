<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdRequest extends Request
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
            'image'=>'required',
            'position'=>'numeric|min:1'
        ];
    }

    public function messages(){
        return [
            'image.required'=>'Vui lòng chọn hình ảnh',
            'position.numeric'=>'Vui lòng chọn vị trí hiển thị quảng cáo',
            'position.min'=>'Vui lòng chọn vị trí hiển thị quảng cáo'
        ];
    }
}
