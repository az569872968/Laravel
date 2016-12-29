<?php

namespace App\Http\Controllers\Home;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
        $user_id   = Session::get('user')->id;
        if( isset($_GET['id']) && !empty($_GET['id'])){
            $search           = $request->get('id');
        }
        if( !empty($search) ){
            $result   = Project::where('id', '=', $search)->first();
        }else{
            $result   = Project::where('user_id', 'LIKE', '%,'.$user_id.',%')->first();
        }
        return view('home.project.index')->with('result',$result);
    }


    /**
     * @param Request $request
     * @return $this
     */
    public function show(Request $request){
        $info    = Project::find((int)$request->get('id'));
        return view('home.project.list')->with('info',$info);
    }


    /**
     * 工程结算
     *
     * @param Request $request
     * @return $this
     */
    public function summary(Request $request){
        $info    = Project::find((int)$request->get('project_id'));
        return view('home.project.summary')->with('info',$info);
    }
}
