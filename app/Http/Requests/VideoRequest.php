<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class VideoRequest extends Request
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
            'video_url'=>'required'
        ];
    }

    public function messages(){
        return [
            'name.required'=>'Vui lòng nhập tên video',
            'url.required'=>'Vui lòng nhập url video',
            'video_url.required'=>'Vui lòng nhập link video',
        ];
    }
}
