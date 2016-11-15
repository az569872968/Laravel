<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Member;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MemberController extends Controller{

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
            $data['recordsTotal'] = Member::count();
            if (strlen($search['value']) > 0) {
                $data['recordsFiltered'] = Member::where(function ($query) use ($search) {
                    $query->where('user_name', 'LIKE', '%' . $search['value'] . '%')->orWhere('user_nickname', 'like', '%' . $search['value'] . '%');
                })->count();
                $data['data'] = Member::where(function ($query) use ($search) {
                    $query->where('user_name', 'LIKE', '%' . $search['value'] . '%')->orWhere('user_nickname', 'like', '%' . $search['value'] . '%');
                })->skip($start)->take($length)->orderBy($columns[$order[0]['column']]['data'], $order[0]['dir'])->get();
            } else {
                $data['recordsFiltered'] = Member::count();
                $data['data'] = Member::skip($start)->take($length)->orderBy($columns[$order[0]['column']]['data'], $order[0]['dir'])->get();
            }
            return response()->json($data);
        }
        return view('admin.member.index');
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
        $Member    = new Member();
        $data = [];
        foreach ($Member->fields as $field => $default) {
            $data[$field] = old($field, $default);
        }
        return view('admin.member.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param PremissionCreateRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\MemberCreateRequest $request){
        $Member = new Member();
        foreach (array_keys($Member->fields) as $field) {
            $Member->$field = $request->get($field);
        }
        $Member->save();
        return redirect('/admin/member')->withSuccess('添加成功！');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $Member   = Member::find((int)$id);
        if (!$Member) return redirect('/admin/member')->withErrors("找不到该会员!");
        foreach (array_keys($Member->fields) as $field) {
            $data[$field] = old($field, $Member->$field);
        }
        $data['id'] = (int)$id;
        return view('admin.member.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\MemberUpdateRequest $request, $id){
        $Member   = Member::find((int)$id);
        foreach (array_keys($Member->fields) as $field) {
            $Member->$field = $request->get($field);
        }
        $Member->save();
        return redirect('/admin/member')->withSuccess('修改成功');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $Member = Member::find((int)$id);
        if ($Member) {
            $Member->delete();
        } else {
            return redirect()->back()->withErrors("删除失败");
        }
        return redirect()->back()->withSuccess("删除成功");
    }
}
