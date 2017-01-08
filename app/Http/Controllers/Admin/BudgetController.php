<?php
namespace App\Http\Controllers\Admin;


use App\Http\Requests\CreateBudgetRequest;
use Dotenv\Validator;
use Illuminate\Http\Request;
use App\Models\Budget;
use App\Models\BudgetRow;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\Response;

class BudgetController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request ){
        $project_id = $request->get("id");
        if($request->ajax()){
            $objects = Budget::where("project_id" ,"=" ,$project_id)->orderBy('budget_id', 'asc')->get();
            $Budgets = [];
            foreach($objects as $object) {
                $config = json_decode($object->sheet_data ,true);
                $config["id"] = $object->budget_id;
                $config["rows"] = [];
                $rows_count = 0;
                $budget_rows_objects = BudgetRow::where("budget_id" ,"=" ,$object->budget_id)->orderBy('budget_row_id', 'asc')->get();
                foreach ($budget_rows_objects as $budget_rows){
                    $rows = json_decode($budget_rows->row_data ,true);
                    array_unshift($rows ,"取消");
                    array_unshift($rows ,$budget_rows->budget_row_id);
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
                $Budgets[] = $config;
            }

            if(empty($Budgets)){
                $Budgets[] = [
                    "id"=>0,
                    "cell"=>[],
                    "formulae"=>[],
                    "mergeCells"=>[],
                    "rows"=> $this->getEmptySheetData(50 ,50),
                    "columns" => $this->getEmptyColumns(50)
                ];
            }
            return response()->json($Budgets);
        }
        return view('admin.budget.index',array("project_id"=>$project_id));
    }



    protected function getEmptySheetData($rowsCount ,$colsCount){
        $rows = [];
        for($i = 0 ; $i < $rowsCount ;$i++) {
            $row = [];
            for ($j = 0; $j < $colsCount; $j++) {
                $row[] = "";
            }
            array_unshift($row ,"取消");
            array_unshift($row ,0);
            $rows[] =$row;

        }
        return $rows;
    }

    protected function getEmptyColumns($rowsCount){
        $columns = [];
        for($i = 1 ; $i < $rowsCount ;$i++){
            $columns[] = array("data"=> $i);
        }
        return $columns;
    }


    public function save( Request $request ){
        $project_id = $request->get("project_id");
        if($request->ajax()){
            $sheets = json_decode( $request->getContent() ,true);
            if(is_null($sheets)){
                return response()->json(array("success"=>false));
            }
            foreach($sheets as $sheet){
                $id = $sheet["id"];
                $rows = $sheet["rows"];
                unset($sheet["rows"]);
                if(0 == $id){
                    $budget = new Budget();
                    $budget->project_id = $project_id;
                    $budget->sheet_name = "sheet_1";
                    $budget->sheet_data = json_encode($sheet);
                    $budget->save();
                }else{
                    Budget::where("budget_id" ,"=" ,$id)->update(["sheet_data"=>json_encode($sheet)]);
                }
                foreach ($rows as $row){
                    $id = array_shift( $row );
                    array_shift($row);
                    if( 0 == $id ){
                        $budget_row = new BudgetRow();
                        $budget_row->budget_id = $budget->id;
                        $budget_row->project_id = $project_id;
                        $budget_row->row_data = json_encode($row);
                        $budget_row->row_confirm_1 = 0;
                        $budget_row->row_confirm_2 = 0;
                        $budget_row->row_confirm_3 = 0;
                        $budget_row->save();
                    }else{
                        BudgetRow::where("budget_row_id" ,"=" ,$id)->update(["row_data"=>json_encode($row)]);
                    }
                }
            }
        }else{
            return response()->json(array("success"=>false));
        }
        return response()->json(array("success"=>true));
    }

    public function delete( Request $request ){
        $id = Input::get("id");
        if($request->ajax()){
            Budget::where("budget_id" ,"=" ,$id)->delete();
            BudgetRow::where("budget_id" ,"=" ,$id)->delete();
            return response()->json(array("success"=>true));
        }
        return response()->json(array("success"=>false));
    }
}