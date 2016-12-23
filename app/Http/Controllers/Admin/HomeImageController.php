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
        $HomeImage   = HomeImage::find(1);
        if (!$HomeImage) return redirect('/admin/homeimage')->withErrors("找不到数据!");
        foreach (array_keys($HomeImage->fields) as $field) {
            $data[$field] = old($field, $HomeImage->$field);
        }
        $data['id'] = 1;
        return view('admin.HomeImage.edit', $data);
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
        return view('admin.homeimage.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        dd($_FILES);
        //dd($file);die;
        $HomeImage   = HomeImage::find((int)$id);
        foreach (array_keys($HomeImage->fields) as $field) {
            $HomeImage->$field = $request->get($field);
        }
        $HomeImage->save();
        return redirect('/admin/homeimage')->withSuccess('修改成功');
    }
}
