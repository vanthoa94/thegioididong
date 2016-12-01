<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MucLucRequest extends Request
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
            'url'=>'required'
        ];
    }

    public function messages(){
        return [
           
            'name.required'=>'Vui lòng nhập tên mục lục',
            'url.required'=>'Vui lòng nhập url mục lục'
        ];
    }
}
