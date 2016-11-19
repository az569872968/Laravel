<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//引入软删除
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model{
    //开启如删除
    use SoftDeletes;

    //设置表名
    protected $table    = 'member';

    //软删除
    protected $dates = ['deleted_at'];

    //设置表字段
    public $fields   = array(
        'user_name'     => '',      //用户名
        'user_pass'     => '',      //用户密码
        'user_nickname' => '',      //用户昵称
        'user_phone'    => '',      //手机号码
        'user_mail'     => '',      //邮箱
        'user_exp'      => '',      //简介
        'user_role'     => '',      //用户组
    );
}
