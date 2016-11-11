<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class BranchRequest extends Request
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
            'city_name'=>'required',
            'zone'=>'numeric|min:1|max:3'
        ];
    }
    public function messages(){
        return [
            'name.required'=>'Vui lòng nhập tên chi nhánh',
            'city_name.required'=>'Vui lòng nhập tên tỉnh/thành phố',
            'zone.numeric'=>'Vui lòng chọn khu vực',
            'zone.min'=>'Có 3 khu vực là Bắc, Trung, Nam',
            'zone.max'=>'Có 3 khu vực là Bắc, Trung, Nam'
        ];
    }
}
