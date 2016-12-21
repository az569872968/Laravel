<?php

namespace App\Http\Controllers\Home;

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
        $data = array();
        $search               = '';
        if( isset($_GET['search']) && !empty($_GET['search'])){
            $search           = $request->get('search');
        }
        $Map['project_id']    = $request->get('project_id');
        if( count($search) > 0){
            $list   = Contract::where(function ($query) use ($search) {
                $query->where('numbering', 'LIKE', '%' . $search. '%')
                    ->orWhere('name', 'like', '%' . $search . '%');
            })->paginate(5);
        }else{
            $list   = Contract::where($Map)->paginate(5);
        }
        return view('admin.Contract.index', array('list'=>$list));
    }
}
