<?php

namespace App\Http\Controllers\Admin;

use App\Models\Member;
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
        $search               = '';
        if( isset($_GET['search']) && !empty($_GET['search'])){
            $search           = $request->get('search');
        }
        $Map['project_id']    = $request->get('project_id');
        $Map['fid']           = $request->get('fid');
        if( count($search) > 0){
            $list   = Contract::where(function ($query) use ($search) {
                $query->where('numbering', 'LIKE', '%' . $search. '%')
                    ->orWhere('name', 'like', '%' . $search . '%');
            })->where($Map)->paginate(10);
        }else{
            $list   = Contract::where($Map)->paginate(10);
        }
        return view('admin.contract.index', array('list'=>$list, 'project_id'=>$request->get('project_id'), 'fid'=>$request->get('fid')));
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
        return view('admin.contract.create', $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param PremissionCreateRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contract       = new Contract();
        foreach (array_keys($contract->fields) as $field) {
            $contract->$field = $request->get($field);
        }
        $file           = $request->file('files');
        if(!empty($file[0]) && $file[0]->isValid()){
            $entension  = $file[0]-> getClientOriginalExtension(); //上传文件的后缀.
            $newName    = date('YmdHis').mt_rand(100,999).'.'.$entension;
            $path       = $file[0]-> move(base_path().'/public/uploads/file/'.date('Ymd'),$newName);
            $filepath   = 'uploads/file/'.date('Ymd').'/'.$newName;
            $contract->file_path = $filepath;
        }
        $files          = $request->file('annex');
        if(!empty($files[0]) && $files[0]->isValid()){
            $entension  = $files[0]-> getClientOriginalExtension(); //上传文件的后缀.
            $newName    = date('YmdHis').mt_rand(100,999).'.'.$entension;
            $path       = $files[0]-> move(base_path().'/public/uploads/file/'.date('Ymd'),$newName);
            $filepath   = 'uploads/file/'.date('Ymd').'/'.$newName;
            $contract->file_annex = $filepath;
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
        return view('admin.contract.edit', $data);
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
            if( !empty($request->get($field)) ){
                $contract->$field = $request->get($field);
            }
        }
        $file           = $request->file('files');
        if(!empty($file[0]) && $file[0]->isValid()){
            $entension  = $file[0]-> getClientOriginalExtension(); //上传文件的后缀.
            $newName    = date('YmdHis').mt_rand(100,999).'.'.$entension;
            $path       = $file[0]-> move(base_path().'/public/uploads/file/'.date('Ymd'),$newName);
            $filepath   = 'uploads/file/'.date('Ymd').'/'.$newName;
            $contract->file_path = $filepath;
        }
        $files          = $request->file('annex');
        if(!empty($files[0]) && $files[0]->isValid()){
            $entension  = $files[0]-> getClientOriginalExtension(); //上传文件的后缀.
            $newName    = date('YmdHis').mt_rand(100,999).'.'.$entension;
            $path       = $files[0]-> move(base_path().'/public/uploads/file/'.date('Ymd'),$newName);
            $filepath   = 'uploads/file/'.date('Ymd').'/'.$newName;
            $contract->file_annex = $filepath;
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




    /**
     * 项目会员列表
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function user( Request $request, $id ){
        $contract     = Contract::find( (int)$id );
        $search       = $request->get('search');
        $user_id      = ltrim( $contract->user_id, ',');
        $MapUser      = explode( ',', rtrim($user_id, ",") );
        if( empty($search) ){
            $MemberList   = Member::select('id','user_name','user_nickname','created_at','user_role','user_phone')->whereIn('id', $MapUser)->paginate(10);
        }else{
            $MemberList   = Member::select('id','user_name','user_nickname','created_at','user_role','user_phone')->where('user_name', 'LIKE', '%' .$search. '%')->orwhere('user_nickname', 'LIKE', '%'.$search.'%')->paginate(10);
        }
        return view('admin.contract.member', array('id'=>$id, 'list'=>$MemberList, 'mapuser'=>$MapUser, 'project_id'=>$contract['project_id'], 'fid'=>$contract['fid']));
    }



    /**
     * 追加项目会员
     *
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function user_add( Request $request, $id){
        $contract           = Contract::find( (int)$id );
        $user_id            = $request->get('user_id');
        $row                = $contract->user_id;
        if( empty($row) ){
            $row            = ','.$user_id.',';   //追加会员
        }else{
            $row            = $row.$user_id.',';   //追加会员
        }
        $contract->user_id    = $row;
        $contract->save();
        return redirect("/admin/contract/$id/user")->withSuccess('添加成功！');
    }


    /**
     * 删除项目会员
     *
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function user_del( Request $request, $id){
        $contract           = Contract::find( (int)$id );
        $user_id            = $request->get('user_id');
        $row                = ltrim(rtrim($contract->user_id, ','), ',');
        $row                = explode(',', $row);
        $key                = array_search($user_id, $row);
        unset($row[$key]);
        $contract->user_id   = ','.implode(',', $row).',';
        $contract->save();
        return redirect("/admin/contract/$id/user")->withSuccess('成功！');
    }
}
