<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    //设置表名
    protected $table = 'video';


    //设置表字段
    public $fields  = [
        'title'=>'',
        'image'=>'',
        'video'=>''
    ];
}
