<?php

namespace App\Http\Controllers\Admin;

use App\Models\Settlement;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SettlementController extends Controller
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
        $Map['fid']           = $request->get('fid');
        if( count($search) > 0){
            $list   = Settlement::where(function ($query) use ($search) {
                $query->where('member', 'LIKE', '%' . $search. '%')
                    ->orWhere('name', 'like', '%' . $search . '%');
            })->paginate(5);
        }else{
            $list   = Settlement::where($Map)->paginate(5);
        }
        return view('admin.settlement.index', array('list'=>$list, 'project_id'=>$request->get('project_id'), 'fid'=>$request->get('fid')));
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
    public function create( Request $request )
    {
        $settlement                         = new Settlement();
        $settlement->fields['project_id']   = (int)$request->get('project_id');
        $data                               = [];
        foreach ($settlement->fields as $field => $default) {
            $data[$field] = old($field, $default);
        }
        if( $request->get('fid') > 0 ){
            $data['fid']  = $request->get('fid');
        }
        return view('admin.settlement.create', $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param PremissionCreateRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests $request)
    {
        $settlement                     = new Settlement();
        foreach (array_keys($settlement->fields) as $field) {
            if( $field != 'file_path') {
                $settlement->$field = $request->get($field);
            }
        }
        $file           = $request->file('files');
        if(!empty($file[0]) && $file[0]->isValid()){
            $entension  = $file[0]-> getClientOriginalExtension(); //上传文件的后缀.
            $newName    = date('YmdHis').mt_rand(100,999).'.'.$entension;
            $path       = $file[0]-> move(base_path().'/uploads/file/'.date('Ymd'),$newName);
            $filepath   = 'uploads/file/'.date('Ymd').'/'.$newName;
            $settlement->file_path = $filepath;
        }
        $settlement->save();
        return redirect("/admin/settlement/index?project_id=".$request->get('project_id').'&fid='.$request->get('fid') )->withSuccess('添加成功！');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $settlement   = Settlement::find((int)$id);
        if (!$settlement) {
            return redirect('/admin/project')->withErrors("服务器异常");
        }
        foreach (array_keys($settlement->fields) as $field) {
            $data[$field] = old($field, $settlement->$field);
        }
        $data['id'] = (int)$id;
        return view('admin.settlement.edit', $data);
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
        $settlement   = Settlement::find((int)$id);
        foreach (array_keys($settlement->fields) as $field) {
            if( $field != 'file_path') {
                $settlement->$field = $request->get($field);
            }
        }
        $file           = $request->file('files');
        if(!empty($file[0]) && $file[0]->isValid()){
            $entension  = $file[0]-> getClientOriginalExtension(); //上传文件的后缀.
            $newName    = date('YmdHis').mt_rand(100,999).'.'.$entension;
            $path       = $file[0]-> move(base_path().'/uploads/file/'.date('Ymd'),$newName);
            $filepath   = 'uploads/file/'.date('Ymd').'/'.$newName;
            $settlement->file_path = $filepath;
        }
        $settlement->save();
        return redirect("/admin/settlement/index?project_id=".$request->get('project_id').'&fid='.$request->get('fid'))->withSuccess('修改成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $settlement   = Settlement::find((int)$id);
        if ($settlement) {
            $settlement->delete();
        } else {
            return redirect()->back()
                ->withErrors("删除失败");
        }
        return redirect()->back()
            ->withSuccess("删除成功");
    }
}
