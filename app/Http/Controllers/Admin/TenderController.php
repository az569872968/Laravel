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
    public function index( Request $request , $id){
        $data = array();
        $data['draw']   = $request->get('draw');
        $start          = $request->get('start');
        $length         = $request->get('length');
        $order          = $request->get('order');
        $columns        = $request->get('columns');
        $search         = $request->get('search');
        $data['recordsTotal'] = Tender::count();
        $data['list']         = Tender::select()->get();
        return view('admin.Tender.index', array('data'=>$data, 'id'=>$id));
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
    public function create( $id )
    {
        $tender     = new Tender();
        $tender->fields['project_id']   = (int)$id;
        $data       = [];
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
    public function store(ProjectCreateRequest $request)
    {
        $tender = new Tender();
        foreach (array_keys($tender->fields) as $field) {
            $tender->$field = $request->get($field);
        }
        $tender->save();
        return redirect('/admin/Tender')->withSuccess('添加成功！');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tender   = Tender::find((int)$id);
        if (!$tender) {
            return redirect('/admin/Tender')->withErrors("找不到该工程!");
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
        $tender->save();
        return redirect('/admin/Tender')->withSuccess('修改成功');
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
