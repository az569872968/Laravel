<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
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
        if( count($search) > 0){
            $list   = Project::where(function ($query) use ($search) {
                $query->where('project_name', 'LIKE', '%' . $search. '%');
            })->paginate(5);
        }else{
            $list   = Project::paginate(15);
        }
        return view('admin.Project.index')->with('list',$list);
    }
}
