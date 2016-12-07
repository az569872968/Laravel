<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tender;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Http\Requests;

class TenderController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request ){
        $data = array();
        $data['draw']   = $request->get('draw');
        $start          = $request->get('start');
        $length         = $request->get('length');
        $order          = $request->get('order');
        $columns        = $request->get('columns');
        $search         = $request->get('search');
        $data['recordsTotal'] = Tender::count();
        $data['list']         = Tender::select()->get();
        return view('admin.Tender.index', array('data'=>$data, 'id'=>$request->get('project_id')));
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
        $tender                         = new Tender();
        $tender->fields['project_id']   = (int)$request->get('project_id');
        $data                           = [];
        foreach ($tender->fields as $field => $default) {
            $data[$field] = old($field, $default);
        }
        return view('admin.Tender.create', $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param PremissionCreateRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\TenderCreateRequest $request)
    {
        $tender = new Tender();
        foreach (array_keys($tender->fields) as $field) {
            $tender->$field = $request->get($field);
        }
        $file           = $request->file('files');
        if($file[0]->isValid()){
            $entension  = $file[0]-> getClientOriginalExtension(); //上传文件的后缀.
            $newName    = date('YmdHis').mt_rand(100,999).'.'.$entension;
            $path       = $file[0]-> move(base_path().'/uploads/file/'.date('Ymd'),$newName);
            $filepath   = 'uploads/file/'.date('Ymd').'/'.$newName;
            $tender->file_path = $filepath;
        }
        $tender->save();
        return redirect("/admin/Tender/index/".$request->get('project_id'))->withSuccess('添加成功！');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $tender   = Tender::find((int)$id);
        if (!$tender) {
            return redirect('/admin/tender?project_id='.$request->get('project_id'))->withErrors("找不到招标文件!");
        }
        foreach (array_keys($tender->fields) as $field) {
            $data[$field] = old($field, $tender->$field);
        }
        $data['id'] = (int)$id;
        return view('admin.Tender.edit', $data);
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
        $tender   = Tender::find((int)$id);
        foreach (array_keys($tender->fields) as $field) {
            $tender->$field = $request->get($field);
        }
        $file           = $request->file('files');
        if($file[0]->isValid()){
            $entension  = $file[0]-> getClientOriginalExtension(); //上传文件的后缀.
            $newName    = date('YmdHis').mt_rand(100,999).'.'.$entension;
            $path       = $file[0]-> move(base_path().'/uploads/file/'.date('Ymd'),$newName);
            $filepath   = 'uploads/file/'.date('Ymd').'/'.$newName;
            $tender->file_path = $filepath;
        }
        $tender->save();
        return redirect('/admin/tender?project_id='.$request->get('project_id'))->withSuccess('修改成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $tender = Tender::find((int)$id);
        if ($tender) {
            $tender->delete();
        } else {
            return redirect()->back()
                ->withErrors("删除失败");
        }
        return redirect()->back()
            ->withSuccess("删除成功");
    }
}
