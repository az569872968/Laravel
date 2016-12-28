<?php

namespace App\Http\Controllers\Home;

use App\Models\Contract;
use App\Models\Project;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ContractController extends Controller
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
        $Map['project_id']    = $request->get('project_id');
        $Map['fid']           = 0;
        if( !empty($search) ){
            $tender   = Contract::where(function ($query) use ($search, $Map) {
                $query->where('numbering', 'LIKE', '%' . $search. '%')
                    ->orWhere('tender_name', 'like', '%' . $search . '%');
            })->where($Map)->paginate(15);
        }else{
            $tender   = Contract::where($Map)->paginate(15);
        }
        $list         = $this->SelectAll($tender);
        $info         = Project::find((int)$request->get('project_id'));
        return view('home.contract.index', array('tender'=>$tender, 'list'=>$list, 'project_id'=>$Map['project_id'], 'info'=>$info) );
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
            $result     = Contract::whereIn('fid', $Map)->get();
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
        $arr=$list->toArray()['data'];
        $refer = array();
        $tree = array();
        foreach($arr as $k => $v){
            $refer[$v['id']] = & $arr[$k];  //创建主键的数组引用
        }
        foreach($arr as $k => $v){
            $pid = $v['fid'];   //获取当前分类的父级id
            if($pid == 0){
                $tree[] = & $arr[$k];   //顶级栏目
            }else{
                if(isset($refer[$pid])){
                    $refer[$pid]['son'][] = & $arr[$k];  //如果存在父级栏目，则添加进父级栏目的子栏目数组中
                }
            }
        }
        return $tree;
    }
}
