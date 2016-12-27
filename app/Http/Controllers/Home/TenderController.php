<?php

namespace App\Http\Controllers\Home;

use App\Models\Tender;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class TenderController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request ){
        $search               = '';
        if( isset($_GET['search']) && !empty($_GET['search'])){
            $search           = $request->get('search');
        }
        $Map['project_id']    = $request->get('project');
        $Map['fid']           = 0;
        if( !empty($search) ){
            $list   = Tender::where(function ($query) use ($search, $Map) {
                $query->where('numbering', 'LIKE', '%' . $search. '%')
                    ->orWhere('tender_name', 'like', '%' . $search . '%');
            })->where($Map)->paginate(15);
        }else{
            $list   = Tender::where($Map)->paginate(15);
        }
        $list       = $this->SelectAll($list);
        dd($list);
        return view('home.tender.index', array('list'=>$list) );
    }




    /**
     * 递归所有的子节点
     *
     * @param $list
     * @return mixed
     */
    private function SelectAll($list){
        $Map        = array();
        $HasArr     = array();
        foreach ($list as $item => &$value){
            $Map[]          = $value['id'];
        }
        $bool   = true;
        do{
            $result     = Tender::whereIn('fid', $Map)->get();
            if( count($result) > 0 ){
                foreach ($result as $item=>$value){
                    $list[]     = $value;
                    unset($value);
                }
                unset($Map);
                unset($HasArr);
                foreach ($result as $item => &$value){
                    $Map[]          = $value['id'];
                }
            }else{
                $bool   = false;
            }
        }while($bool);
        $tree = array();
        foreach($list as $item){
            if(isset($list[$item['fid']])){
                $list[$item['fid']]['son'][] = $list[$item['id']];
            }else{
                $tree[] = $list[$item['id']];
            }
        }
        dd($tree);
        return $list;
    }
}
