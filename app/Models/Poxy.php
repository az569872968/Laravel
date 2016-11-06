<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PoxyModel extends Model
{
    //设置表名
    protected $table = 'proxy_bidding';

    //设置表字段
    public $fields  = [
        'project_id'=>'',
        'contract_no'=>'',
        'file_name'=>'',
        'file_no'=>'',
        'remark'=>'',
        'file_path'=>''
    ];
}
