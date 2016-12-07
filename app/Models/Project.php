<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

//引入软删除
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model{
    //开启如删除
    use SoftDeletes;

    //设置表名
    protected $table = 'project';

    //软删除
    protected $dates = ['deleted_at'];

    //设置表字段
    public $fields  = [
        'project_name'=>'',
        'project_exp'=>'',
        'project_path'=>'',
        'project_pinyin'=>'',
        'project_address'=>'',
        'project_start_time'=>'',
        'project_end_time'=>'',
        'user_id'=>''
    ];
}
