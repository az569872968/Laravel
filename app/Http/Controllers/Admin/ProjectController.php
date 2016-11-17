<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProjectCreateRequest;
use App\Models\Member;
use App\Models\Project;
use Dotenv\Validator;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class ProjectController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request ){
        $data = array();
        $data['draw'] = $request->get('draw');
        $start = $request->get('start');
        $length = $request->get('length');
        $order = $request->get('order');
        $columns = $request->get('columns');
        $search = $request->get('search');
        $data['recordsTotal'] = Project::count();
        $data['list']         = Project::select()->get();
        return view('admin.Project.index')->with('data',$data);
    }



    public function user( $id ){
        $project      = Project::find( (int)$id );
        $user_id      = $project->user_id;
        $MapUser      = explode( ',', rtrim($user_id, ",") );
        $MemberList   = Member::select('id','user_name','user_nickname','created_at','user_role','user_phone')->whereIn('id', $MapUser)->get();
        return view('admin.Project.member')->with('list',$MemberList);
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $project     = new Project();
        $data = [];
        foreach ($project->fields as $field => $default) {
            $data[$field] = old($field, $default);
        }
        return view('admin.project.create', $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param PremissionCreateRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProjectCreateRequest $request)
    {
        $project = new Project();
        foreach (array_keys($project->fields) as $field) {
            $project->$field = $request->get($field);
        }
        $project->save();
        return redirect('/admin/project')->withSuccess('添加成功！');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $project   = Project::find((int)$id);
        if (!$project) {
            return redirect('/admin/project')->withErrors("找不到该工程!");
        }
        foreach (array_keys($project->fields) as $field) {
            $data[$field] = old($field, $project->$field);
        }
        $data['id'] = (int)$id;
        return view('admin.project.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $project   = Project::find((int)$id);
        foreach (array_keys($project->fields) as $field) {
            $project->$field = $request->get($field);
        }
        $project->save();
        return redirect('/admin/project')->withSuccess('修改成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $project = Project::find((int)$id);
        if ($project) {
            $project->delete();
        } else {
            return redirect()->back()
                ->withErrors("删除失败");
        }
        return redirect()->back()
            ->withSuccess("删除成功");
    }
}
