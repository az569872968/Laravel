<?php

namespace App\Http\Controllers\Admin;

use App\Models\HomeImage;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeImageController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request ){
        if( $request->ajax() ){
            $data           = array();
            $data['draw']   = $request->get('draw');
            $start          = $request->get('start');
            $length         = $request->get('length');
            $order          = $request->get('order');
            $columns        = $request->get('columns');
            $search         = $request->get('search');
            $data['recordsTotal'] = HomeImage::count();
            if (strlen($search['value']) > 0) {
                $data['recordsFiltered'] = HomeImage::where(function ($query) use ($search) {
                    $query->where('user_name', 'LIKE', '%' . $search['value'] . '%')->orWhere('user_nickname', 'like', '%' . $search['value'] . '%');
                })->count();
                $data['data'] = HomeImage::where(function ($query) use ($search) {
                    $query->where('user_name', 'LIKE', '%' . $search['value'] . '%')->orWhere('user_nickname', 'like', '%' . $search['value'] . '%');
                })->skip($start)->take($length)->orderBy($columns[$order[0]['column']]['data'], $order[0]['dir'])->get();
            } else {
                $data['recordsFiltered'] = HomeImage::count();
                $data['data'] = HomeImage::skip($start)->take($length)->orderBy($columns[$order[0]['column']]['data'], $order[0]['dir'])->get();
            }
            return response()->json($data);
        }
        return view('admin.HomeImage.index');
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
    public function create(){
        $HomeImage      = new HomeImage();
        $data           = [];
        foreach ($HomeImage->fields as $field => $default) {
            $data[$field] = old($field, $default);
        }
        return view('admin.HomeImage.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PremissionCreateRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $HomeImage     = new HomeImage();
        foreach (array_keys($HomeImage->fields) as $field) {
            $HomeImage->$field = $request->get($field);
        }
        $HomeImage->save();
        return redirect('/admin/homeimage')->withSuccess('添加成功！');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $HomeImage   = HomeImage::find((int)$id);
        if (!$HomeImage) return redirect('/admin/homeimage')->withErrors("找不到数据!");
        foreach (array_keys($HomeImage->fields) as $field) {
            $data[$field] = old($field, $HomeImage->$field);
        }
        $data['id'] = (int)$id;
        return view('admin.HomeImage.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $HomeImage   = HomeImage::find((int)$id);
        foreach (array_keys($HomeImage->fields) as $field) {
            $HomeImage->$field = $request->get($field);
        }
        $HomeImage->save();
        return redirect('/admin/homeimage')->withSuccess('修改成功');
    }
}
