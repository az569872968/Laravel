<?php

namespace App\Http\Controllers\Home;

use App\Models\Tender;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

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
        $Map['project_id']    = $request->get('project_id');
        if( count($search) > 0){
            $list   = Tender::where(function ($query) use ($search, $Map) {
                $query->where('numbering', 'LIKE', '%' . $search. '%')
                    ->orWhere('tender_name', 'like', '%' . $search . '%')
                    ->where('project_id', '=', $Map['project_id']);
            })->paginate(15);
        }else{
            $list   = Tender::where($Map)->paginate(15);
        }
        return view('home.tender.index', array('list'=>$list) );
    }


    private function SelectAll($list){
        $Map        = array();
        foreach ($list as $item){
            $Map[]  = $item['id'];
        }
        $result     = Tender::inwhere('fid', $Map)->get();
        foreach ($result)
    }
}
