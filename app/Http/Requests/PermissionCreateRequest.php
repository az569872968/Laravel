<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class PermissionCreateRequest extends Request
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
            'name'=>'required|unique:permissions|max:255',
            'display_name'=>'required|max:255',
            'cid'=>'required|int',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'请输入标题',
            'name.unique'=>'标题不能重复',
            'name.max'=>'标题长度50字符',
            'display_name.required'=>'摘要不能为空',
            'cid.required'=>'cid不能为空',
        ];
    }
}
