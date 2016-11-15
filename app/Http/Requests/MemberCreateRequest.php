<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class MemberCreateRequest extends Request
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
            'user_name'     => ['required', 'unique:member,user_name', 'max:255'],
            'user_pass'     => ['required', 'min:6'],
            'user_nickname' => ['required', 'max:255'],
            'user_phone'    => ['required', 'max:11', 'min:11'],
            'user_mail'     => ['regex:/^\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/'],
            'user_role'     => ['in:施工商,承包商,中间人'],
        ];
    }
}
