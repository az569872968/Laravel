<?php

namespace App\Http\Controllers\Home;

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
            $list   = Tender::where(function ($query) use ($search) {
                $query->where('numbering', 'LIKE', '%' . $search. '%')
                    ->orWhere('tender_name', 'like', '%' . $search . '%');
            })->paginate(5);
        }else{
            $list   = Tender::where($Map)->paginate(5);
        }
        return view('admin.Tender.index', array('list'=>$list) );
    }
}
