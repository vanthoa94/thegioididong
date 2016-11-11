<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class SupportRequest extends Request
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
            'phone'=>'required',
            'group'=>'numeric|min:1'
        ];
    }

    public function messages(){
        return [
            'name.required'=>'Vui lòng nhập tên',
            'phone.required'=>'Vui lòng nhập số đt',
            'group.numeric'=>'Vui lòng chọn nhóm',
            'group.min'=>'Vui lòng chọn nhóm'
        ];
    }
}
