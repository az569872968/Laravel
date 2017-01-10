<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Models\Budget;
use App\Models\BudgetRow;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class BudgetController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request ,$id)
    {
        $Budgets    = Budget::where("project_id" ,"=" ,$id)->orderBy('budget_id', 'asc')->get();
        $Sheets     = [];
        foreach($Budgets as $Budget) {
            $config = json_decode($Budget->sheet_data ,true);
            $config["id"] = $Budget->budget_id;
            $config["rows"] = [];
            $rows_count = 0;
            $BudgetRows = BudgetRow::where("budget_id" ,"=" ,$Budget->budget_id)->orderBy('budget_row_id', 'asc')->get();
            foreach ($BudgetRows as $BudgetRow){
                $rows = json_decode($BudgetRow->row_data ,true);
                array_unshift($rows ,"确定");
                array_unshift($rows ,$BudgetRow->budget_row_id);
                $count = count($rows);
                if($rows_count < $count){
                    $rows_count = $count;
                }
                $config["rows"][] = $rows;
            }
            $config["columns"] = [];//隐藏第一列
            for($i = 1 ; $i < $rows_count ;$i++){
                $config["columns"][] = array("data"=> $i);
            }
            $Sheets[] = json_encode($config);
        }
        return view('home.budget.index' ,array("sheets"=>$Sheets));
    }
}