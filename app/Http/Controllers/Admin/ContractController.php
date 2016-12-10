<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\Contract;

class ContractController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request ){
        $data = array();
        $start          = $request->get('start');
        $length         = $request->get('length');
        $order          = $request->get('order');
        $columns        = $request->get('columns');
        $search         = $request->get('search');
        $Map['project_id']    = $request->get('project_id');
        $Map['fid']           = $request->get('fid');
        $data['recordsTotal'] = Contract::count();
        $data['list']         = Contract::select()->where($Map)->get();
        return view('admin.Contract.index', array('data'=>$data, 'project_id'=>$request->get('project_id'), 'fid'=>$request->get('fid')));
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
        $contract                         = new Contract();
        $contract->fields['project_id']   = (int)$request->get('project_id');
        $data                           = [];
        foreach ($contract->fields as $field => $default) {
            $data[$field] = old($field, $default);
        }
        if( $request->get('fid') > 0 ){
            $data['fid']  = $request->get('fid');
        }
        return view('admin.Contract.create', $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param PremissionCreateRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\TenderCreateRequest $request)
    {
        $contract       = new Contract();
        foreach (array_keys($contract->fields) as $field) {
            $contract->$field = $request->get($field);
        }
        $file           = $request->file('files');
        if(!empty($file[0]) && $file[0]->isValid()){
            $entension  = $file[0]-> getClientOriginalExtension(); //上传文件的后缀.
            $newName    = date('YmdHis').mt_rand(100,999).'.'.$entension;
            $path       = $file[0]-> move(base_path().'/uploads/file/'.date('Ymd'),$newName);
            $filepath   = 'uploads/file/'.date('Ymd').'/'.$newName;
            $contract->file_path = $filepath;
        }
        $contract->save();
        return redirect("/admin/contract/index?project_id=".$request->get('project_id').'&fid='.$request->get('fid') )->withSuccess('添加成功！');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $contract   = Contract::find((int)$id);
        if (!$contract) {
            return redirect('/admin/project')->withErrors("服务器异常");
        }
        foreach (array_keys($contract->fields) as $field) {
            $data[$field] = old($field, $contract->$field);
        }
        $data['id'] = (int)$id;
        return view('admin.Contract.edit', $data);
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
        $contract   = Contract::find((int)$id);
        foreach (array_keys($contract->fields) as $field) {
            if( $field != 'file_path'){
                $contract->$field = $request->get($field);
            }
        }
        $file           = $request->file('files');
        if(!empty($file[0]) && $file[0]->isValid()){
            $entension  = $file[0]-> getClientOriginalExtension(); //上传文件的后缀.
            $newName    = date('YmdHis').mt_rand(100,999).'.'.$entension;
            $path       = $file[0]-> move(base_path().'/uploads/file/'.date('Ymd'),$newName);
            $filepath   = 'uploads/file/'.date('Ymd').'/'.$newName;
            $contract->file_path = $filepath;
        }
        $contract->save();
        return redirect("/admin/contract/index?project_id=".$request->get('project_id').'&fid='.$request->get('fid'))->withSuccess('修改成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $contract   = Contract::find((int)$id);
        if ($contract) {
            $contract->delete();
        } else {
            return redirect()->back()
                ->withErrors("删除失败");
        }
        return redirect()->back()
            ->withSuccess("删除成功");
    }
}
