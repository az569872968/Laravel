<?php

namespace App\Http\Controllers\Admin;

use App\Models\Link;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LinkController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request ){
        if ($request->ajax()) {
            $data = array();
            $data['draw']   = $request->get('draw');
            $start          = $request->get('start');
            $length         = $request->get('length');
            $order          = $request->get('order');
            $columns        = $request->get('columns');
            $search         = $request->get('search');
            $data['recordsTotal'] = Link::count();
            if (strlen($search['value']) > 0) {
                $data['recordsFiltered'] = Link::where(function ($query) use ($search) {
                    $query->where('title', 'LIKE', '%' . $search['value'] . '%');
                })->count();
                $data['data'] = Link::where(function ($query) use ($search) {
                    $query->where('title', 'LIKE', '%' . $search['value'] . '%');
                })
                    ->skip($start)->take($length)
                    ->orderBy($columns[$order[0]['column']]['data'], $order[0]['dir'])
                    ->get();
            } else {
                $data['recordsFiltered'] = Link::count();
                $data['data'] = Link::
                skip($start)->take($length)
                    ->orderBy($columns[$order[0]['column']]['data'], $order[0]['dir'])
                    ->get();
            }
            return response()->json($data);
        }
        return view('admin.link.index');
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
        $link    = new Link();
        $data = [];
        foreach ($link->fields as $field => $default) {
            $data[$field] = old($field, $default);
        }
        return view('admin.link.create', $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param PremissionCreateRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $link    = new Link();
        foreach (array_keys($link->fields) as $field) {
            if( !empty($request->get($field)) ){
                $link->$field = $request->get($field);
            }
        }
        $file           = $request->file('files');
        if(!empty($file[0]) && $file[0]->isValid()){
            $entension  = $file[0]-> getClientOriginalExtension(); //上传文件的后缀.
            $newName    = date('YmdHis').mt_rand(100,999).'.'.$entension;
            $path       = $file[0]-> move(base_path().'/public/uploads/imges/'.date('Ymd'),$newName);
            $filepath   = 'uploads/imges/'.date('Ymd').'/'.$newName;
            $link->img = $filepath;
        }
        $link->save();
        return redirect('/admin/link')->withSuccess('添加成功！');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $link    = Link::find((int)$id);
        if (!$link) return redirect('/admin/link')->withErrors("找不到该文章!");
        foreach (array_keys($link->fields) as $field) {
            $data[$field] = old($field, $link->$field);
        }
        $data['id'] = (int)$id;
        return view('admin.link.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $link    = Link::find((int)$id);
        foreach (array_keys($link->fields) as $field) {
            if( !empty($request->get($field)) ){
                $link->$field = $request->get($field);
            }
        }
        $file           = $request->file('files');
        if(!empty($file[0]) && $file[0]->isValid()){
            $entension  = $file[0]-> getClientOriginalExtension(); //上传文件的后缀.
            $newName    = date('YmdHis').mt_rand(100,999).'.'.$entension;
            $path       = $file[0]-> move(base_path().'/public/uploads/imges/'.date('Ymd'),$newName);
            $filepath   = 'uploads/imges/'.date('Ymd').'/'.$newName;
            $link->img = $filepath;
        }
        $link->save();
        return redirect('/admin/link')->withSuccess('修改成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $link    = Link::find((int)$id);
        if ($link) {
            $link->delete();
        } else {
            return redirect()->back()->withErrors("删除失败");
        }
        return redirect()->back()->withSuccess("删除成功");
    }
}
