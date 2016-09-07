<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $table = 'article';



    public $fields = [
        'title' => '',
        'bewrite' => '',
        'author' => '',
        'scan_num' => 0,
        'user_id' => '',
        'sort' => 0,
        'remark' => '',
    ];

}
