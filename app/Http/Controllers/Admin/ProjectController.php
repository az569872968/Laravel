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
        $search               = '';
        if( isset($_GET['search']) && !empty($_GET['search'])){
            $search           = $request->get('search');
        }
        if( count($search) > 0){
            $list   = Project::where(function ($query) use ($search) {
                $query->where('project_name', 'LIKE', '%' . $search. '%');
            })->orderBy('id', 'desc')->paginate(10);
        }else{
            $list   = Project::orderBy('id', 'desc')->paginate(10);
        }
        return view('admin.project.index')->with('list',$list);
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
        $file           = $request->file('files');
        if(!empty($file[0]) && $file[0]->isValid()){
            $entension  = $file[0]-> getClientOriginalExtension(); //上传文件的后缀.
            $newName    = date('YmdHis').mt_rand(100,999).'.'.$entension;
            $path       = $file[0]-> move(base_path().'/public/uploads/'.date('Ymd'),$newName);
            $filepath   = 'public/uploads/'.date('Ymd').'/'.$newName;
            $project->project_path = $filepath;
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
            if( !empty($request->get($field)) ){
                $project->$field = $request->get($field);
            }
        }
        $file           = $request->file('files');
        if(!empty($file[0]) && $file[0]->isValid()){
            $entension  = $file[0]-> getClientOriginalExtension(); //上传文件的后缀.
            $newName    = date('YmdHis').mt_rand(100,999).'.'.$entension;
            $path       = $file[0]-> move(base_path().'/public/uploads/imges/'.date('Ymd'),$newName);
            $filepath   = 'public/uploads/imges/'.date('Ymd').'/'.$newName;
            $project->project_path = $filepath;
        }
        $file           = $request->file('upload');
        if(!empty($file[0]) && $file[0]->isValid()){
            $entension  = $file[0]-> getClientOriginalExtension(); //上传文件的后缀.
            $newName    = date('YmdHis').mt_rand(100,999).'.'.$entension;
            $path       = $file[0]-> move(base_path().'/public/uploads/imges/'.date('Ymd'),$newName);
            $filepath   = 'public/uploads/file/'.date('Ymd').'/'.$newName;
            $project->summary = $filepath;
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


    /**
     * 项目会员列表
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function user( Request $request, $id ){
        $project      = Project::find( (int)$id );
        $search       = $request->get('search');
        $user_id      = ltrim( $project->user_id, ',');
        $MapUser      = explode( ',', rtrim($user_id, ",") );
        if( empty($search) ){
            $MemberList   = Member::select('id','user_name','user_nickname','created_at','user_role','user_phone')->whereIn('id', $MapUser)->paginate(15);
        }else{
            $MemberList   = Member::select('id','user_name','user_nickname','created_at','user_role','user_phone')->where('user_name', 'LIKE', '%' .$search. '%')->orwhere('user_nickname', 'LIKE', '%'.$search.'%')->paginate(15);
        }
        return view('admin.project.member', array('id'=>$id, 'list'=>$MemberList, 'mapuser'=>$MapUser));
    }


    /**
     * 追加项目会员
     *
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function user_add( Request $request, $id){
        $project            = Project::find( (int)$id );
        $user_id            = $request->get('user_id');
        $row                = $project->user_id;
        if( empty($row) ){
            $row            = ','.$user_id.',';   //追加会员
        }else{
            $row            = $row.$user_id.',';   //追加会员
        }
        $project->user_id   = $row;
        $project->save();
        return redirect("/admin/project/$id/user")->withSuccess('添加成功！');
    }


    /**
     * 删除项目会员
     *
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function user_del( Request $request, $id){
        $project            = Project::find( (int)$id );
        $user_id            = $request->get('user_id');
        $row                = ltrim(rtrim($project->user_id, ','), ',');
        $row                = explode(',', $row);
        $key                = array_search($user_id, $row);
        unset($row[$key]);
        $project->user_id   = ','.implode(',', $row).',';
        $project->save();
        return redirect("/admin/project/$id/user")->withSuccess('成功！');
    }


    /**
     * 上传结算文件
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function summary($id){
        $project            = Project::find( (int)$id );
        foreach (array_keys($project->fields) as $field) {
            $data[$field] = old($field, $project->$field);
        }
        $data['id'] = (int)$id;
        return view('admin.project.summary', $data);
    }
}
