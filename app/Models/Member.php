<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model{

    //设置表名
    protected $table    = 'member';

    //设置表字段
    protected $fields   = array(
        'user_name'     => '',      //用户名
        'user_pass'     => '',      //用户密码
        'user_nickname' => '',      //用户昵称
        'user_phone'    => '',      //手机号码
        'user_mail'     => '',      //邮箱
        'user_exp'      => '',      //简介
        'user_role'     => '',      //用户组
    );
}
