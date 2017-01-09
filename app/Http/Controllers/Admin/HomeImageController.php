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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $HomeImage   = HomeImage::find((int)$id);
        foreach (array_keys($HomeImage->fields) as $field) {
            $files          = $request->file($field);
            if(!empty($files[0]) && $files[0]->isValid()){
                $entension  = $files[0]-> getClientOriginalExtension(); //上传文件的后缀.
                $newName    = date('YmdHis').mt_rand(100,999).'.'.$entension;
                $path       = $files[0]-> move(base_path().'/public/uploads/file/'.date('Ymd'),$newName);
                $filepath   = 'uploads/file/'.date('Ymd').'/'.$newName;
                $HomeImage->$field = $filepath;
            }
        }
        $HomeImage->save();
        return redirect('/admin/homeimage')->withSuccess('修改成功');
    }
}
