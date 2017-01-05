<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//引入软删除
use Illuminate\Database\Eloquent\SoftDeletes;

class Contract extends Model
{
    //开启如删除
    use SoftDeletes;

    //设置表名
    protected $table = 'contract';

    //软删除
    protected $dates = ['deleted_at'];

    //设置表字段
    public $fields  = [
        'project_id'=>'',
        'fid'=>0,
        'numbering'=>'',
        'name'=>'',
        'file_num'=>'',
        'file_path'=>'',
        'file_annex'=>'',
        'schedule'=>'',
        'date_time'=>'',
        'remark'=>''
    ];
}
