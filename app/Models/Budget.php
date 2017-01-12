<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Budget extends Model
{
    protected $table = 'budget';


    public $fields = [
        'budget_id'=>0,
        'project_id' => 0,
        'sheet_name' => '',
        'sheet_data' => '',
    ];

}
