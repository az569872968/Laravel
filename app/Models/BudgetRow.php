<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BudgetRow extends Model
{
    protected $table = 'budget_row';

    public $fields = [
        'budget_id' => 0,
        'project_id'=>0,
        'row_data' => '',
        'row_confirm_1' => 0,
        'row_confirm_2' => 0,
        'row_confirm_3' => 0,
    ];

}
