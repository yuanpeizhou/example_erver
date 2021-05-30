<?php

namespace App\Http\Requests;
use App\Http\Requests\BaseRequest;

/**
 * 学生控制器表单验证
 */
class StuedntFormRequest extends BaseRequest{
    public function rules(){
        return [
            'username' => 'bail|required|string|max:10',
            'tel' => 'string|size:11',
            'age' => 'numeric|between:1,200',
            'sex' => 'numeric|between:1,2'
        ];
    }

    public function messages()
    {
        return [
            'username.required' => '请填写学生姓名',
            'username.max' => '姓名长度超出(10个字符)',
            'tel.size' => '电话号码格式错误',
            'age.numeric' => '年龄必须是数字',
            'age.between'  => '年龄超出范围(1-200)',
            'sex.numeric'  => '请正确填写性别',
            'sex.between' => '请正确填写性别'
        ];
    }
}