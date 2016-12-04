<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ContactRequest extends Request
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
            'email'=>'required|email',
            'subject'=>'required',
            'message'=>'required'
        ];
    }

    public function messages(){
        return [
            'name.required'=>'Vui lòng nhập họ tên của bạn',
            'email.required'=>'Vui lòng nhập email',
            'email.email'=>'Email không hợp lệ',
            'subject.required'=>'Vui lòng nhập tiêu đề',
            'message.required'=>'Vui lòng nhập nội dung'
        ];

    }
}
