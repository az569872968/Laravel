<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //设置表名
    protected $table = 'project';

    //设置表字段
    public $fields  = [
        'project_name'=>'',
        'project_exp'=>'',
        'project_path_max'=>'',
        'project_path_min'=>'',
        'project_pinyin'=>'',
        'project_start_time'=>'',
        'project_end_time'=>'',
        'user_id'=>''
    ];
}
