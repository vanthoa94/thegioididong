<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MuaSachRequest extends Request
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
            'book_id'=>'required|numeric|min:1',
            'price'=>'required|numeric'
        ];
    }

    public function messages(){
        return [
            'book_id.required'=>'Sách không tồn tại',
            'book_id.numeric'=>'Sách không tồn tại',
            'book_id.min'=>'Sách không tồn tại',
            'price.required'=>'Sách không tồn tại',
            'price.numeric'=>'Sách không tồn tại'
        ];
    }
}
