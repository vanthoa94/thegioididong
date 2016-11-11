<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AgencyRequest extends Request
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
            'branch_id'=>'numeric|min:1',
            'address'=>'required'
        ];
    }

    public function messages(){
        return [
            'name.required'=>'Vui lòng nhập tên đại lý',
            'branch_id.numeric'=>'Vui lòng chọn chi nhánh',
            'branch_id.min'=>'Vui lòng chọn chi nhánh',
            'address.required'=>'Vui lòng nhập địa chỉ'
        ];
    }
}
