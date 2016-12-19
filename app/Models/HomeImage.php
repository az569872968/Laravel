<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeImage extends Model
{
    //设置表名
    protected $table = 'home_img';


    //设置表字段
    public $fields  = [
        'image1'=>'',
        'image2'=>'',
        'image3'=>'',
        'image4'=>'',
        'image5'=>'',
        'image6'=>''
    ];
}
