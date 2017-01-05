<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Settlement extends Model
{
    //开启软删除
    use SoftDeletes;

    //设置表名
    protected $table    = 'settlement';

    //软删除
    protected $dates    = ['deleted_at'];


    //设置字段
    public $fields      = array(
        'project_id'    =>'',
        'member'        =>'',
        'name'          =>'',
        'file_member'   =>'',
        'date'          =>'',
        'remark'        =>'',
        'fid'           =>0,
        'excel'         =>'',
        'schedule'      =>'',
        'date_time'     =>'',
        'cad'           =>''
    );
}
