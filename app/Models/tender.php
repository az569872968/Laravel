<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tender extends Model{
    //
    //开启如删除
    use SoftDeletes;

    //设置表名
    protected $table = 'tender';

    //软删除
    protected $dates = ['deleted_at'];

    //设置表字段
    public $fields  = [
        'project_id'=>'',
        'numbering'=>'',
        'tender_name'=>'',
        'file_num'=>'',
        'file_path'=>'',
        'remark'=>''
    ];
}
