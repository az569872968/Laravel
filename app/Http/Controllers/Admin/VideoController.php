<?php

namespace App\Http\Controllers\Admin;

use App\Models\Video;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class VideoController extends Controller
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
            $data['recordsTotal'] = Video::count();
            if (strlen($search['value']) > 0) {
                $data['recordsFiltered'] = Video::where(function ($query) use ($search) {
                    $query->where('title', 'LIKE', '%' . $search['value'] . '%')
                        ->orWhere('author', 'like', '%' . $search['value'] . '%');
                })->count();
                $data['data'] = Video::where(function ($query) use ($search) {
                    $query->where('title', 'LIKE', '%' . $search['value'] . '%')
                        ->orWhere('author', 'like', '%' . $search['value'] . '%');
                })
                    ->skip($start)->take($length)
                    ->orderBy($columns[$order[0]['column']]['data'], $order[0]['dir'])
                    ->get();
            } else {
                $data['recordsFiltered'] = Video::count();
                $data['data'] = Video::
                skip($start)->take($length)
                    ->orderBy($columns[$order[0]['column']]['data'], $order[0]['dir'])
                    ->get();
            }
            return response()->json($data);
        }
        return view('admin.video.index');
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
        $video    = new Video();
        $data = [];
        foreach ($video->fields as $field => $default) {
            $data[$field] = old($field, $default);
        }
        return view('admin.video.create', $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param PremissionCreateRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $video = new Video();
        foreach (array_keys($video->fields) as $field) {
            if( !empty($request->get($field)) ){
                $video->$field = $request->get($field);
            }
        }
        $file           = $request->file('files');
        if(!empty($file[0]) && $file[0]->isValid()){
            $entension  = $file[0]-> getClientOriginalExtension(); //上传文件的后缀.
            $newName    = date('YmdHis').mt_rand(100,999).'.'.$entension;
            $path       = $file[0]-> move(base_path().'/public/uploads/'.date('Ymd'),$newName);
            $filepath   = 'uploads/'.date('Ymd').'/'.$newName;
            $video->image = $filepath;
        }
        $video->save();
        return redirect('/admin/video')->withSuccess('添加成功！');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $video   = Video::find((int)$id);
        if (!$video) return redirect('/admin/article')->withErrors("找不到该文章!");
        foreach (array_keys($video->fields) as $field) {
            $data[$field] = old($field, $video->$field);
        }
        $data['id'] = (int)$id;
        return view('admin.video.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $video   = Video::find((int)$id);
        foreach (array_keys($video->fields) as $field) {
            if( !empty($request->get($field)) ){
                $video->$field = $request->get($field);
            }
        }
        $file           = $request->file('files');
        if(!empty($file[0]) && $file[0]->isValid()){
            $entension  = $file[0]-> getClientOriginalExtension(); //上传文件的后缀.
            $newName    = date('YmdHis').mt_rand(100,999).'.'.$entension;
            $path       = $file[0]-> move(base_path().'/public/uploads/'.date('Ymd'),$newName);
            $filepath   = 'uploads/'.date('Ymd').'/'.$newName;
            $video->image = $filepath;
        }
        $video->save();
        return redirect('/admin/video')->withSuccess('修改成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $video   = Video::find((int)$id);
        if ($video) {
            $video->delete();
        } else {
            return redirect()->back()->withErrors("删除失败");
        }
        return redirect()->back()->withSuccess("删除成功");
    }
}
