<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    //设置表名
    protected $table    = 'link';

    //设置字段
    public $fields      = array(
        'title'=>'',
        'img'  =>'',
        'url'  =>''
    );
}
