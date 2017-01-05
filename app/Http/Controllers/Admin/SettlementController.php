<?php

namespace App\Http\Controllers\Admin;

use App\Models\Member;
use App\Models\Settlement;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class SettlementController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request ){
        $search               = '';
        if( isset($_GET['search']) && !empty($_GET['search'])){
            $search           = $request->get('search');
        }
        $Map['project_id']    = $request->get('project_id');
        $Map['fid']           = $request->get('fid');
        if( count($search) > 0){
            $list   = Settlement::where(function ($query) use ($search) {
                $query->where('member', 'LIKE', '%' . $search. '%')
                    ->orWhere('name', 'like', '%' . $search . '%');
            })->where($Map)->paginate(5);
        }else{
            $list   = Settlement::where($Map)->paginate(5);
        }
        return view('admin.settlement.index', array('list'=>$list, 'project_id'=>$request->get('project_id'), 'fid'=>$request->get('fid')));
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
        $settlement                         = new Settlement();
        $settlement->fields['project_id']   = (int)$request->get('project_id');
        $data                               = [];
        foreach ($settlement->fields as $field => $default) {
            $data[$field] = old($field, $default);
        }
        if( $request->get('fid') > 0 ){
            $data['fid']  = $request->get('fid');
        }
        return view('admin.settlement.create', $data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param PremissionCreateRequest|Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $settlement                     = new Settlement();
        foreach (array_keys($settlement->fields) as $field) {
            if( $field != 'file_path') {
                $settlement->$field = $request->get($field);
            }
        }
        $file           = $request->file('excel');
        if(!empty($file[0]) && $file[0]->isValid()){
            $entension  = $file[0]-> getClientOriginalExtension(); //上传文件的后缀.
            $newName    = date('YmdHis').mt_rand(100,999).'.'.$entension;
            $path       = $file[0]-> move(base_path().'/public/uploads/file/'.date('Ymd'),$newName);
            $filepath   = 'public/uploads/file/'.date('Ymd').'/'.$newName;
            $settlement->excel = $filepath;
        }
        unset($file);
        $file           = $request->file('cad');
        if(!empty($file[0]) && $file[0]->isValid()){
            $entension  = $file[0]-> getClientOriginalExtension(); //上传文件的后缀.
            $newName    = date('YmdHis').mt_rand(100,999).'.'.$entension;
            $path       = $file[0]-> move(base_path().'/public/uploads/imges/'.date('Ymd'),$newName);
            $filepath   = 'public/uploads/file/'.date('Ymd').'/'.$newName;
            $settlement->cad = $filepath;
        }
        $settlement->save();
        return redirect("/admin/settlement/index?project_id=".$request->get('project_id').'&fid='.$request->get('fid') )->withSuccess('添加成功！');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $settlement   = Settlement::find((int)$id);
        if (!$settlement) {
            return redirect('/admin/project')->withErrors("服务器异常");
        }
        foreach (array_keys($settlement->fields) as $field) {
            $data[$field] = old($field, $settlement->$field);
        }
        $data['id'] = (int)$id;
        return view('admin.settlement.edit', $data);
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
        $settlement   = Settlement::find((int)$id);
        foreach (array_keys($settlement->fields) as $field) {
            if( !empty($request->get($field)) ){
                $settlement->$field = $request->get($field);
            }
        }
        $file           = $request->file('excel');
        if(!empty($file[0]) && $file[0]->isValid()){
            $entension  = $file[0]-> getClientOriginalExtension(); //上传文件的后缀.
            $newName    = date('YmdHis').mt_rand(100,999).'.'.$entension;
            $path       = $file[0]-> move(base_path().'/public/uploads/file/'.date('Ymd'),$newName);
            $filepath   = 'public/uploads/file/'.date('Ymd').'/'.$newName;
            $settlement->excel = $filepath;
        }
        unset($file);
        $file           = $request->file('cad');
        if(!empty($file[0]) && $file[0]->isValid()){
            $entension  = $file[0]-> getClientOriginalExtension(); //上传文件的后缀.
            $newName    = date('YmdHis').mt_rand(100,999).'.'.$entension;
            $path       = $file[0]-> move(base_path().'/public/uploads/imges/'.date('Ymd'),$newName);
            $filepath   = 'public/uploads/file/'.date('Ymd').'/'.$newName;
            $settlement->cad = $filepath;
        }
        $settlement->save();
        return redirect("/admin/settlement/index?project_id=".$request->get('project_id').'&fid='.$request->get('fid'))->withSuccess('修改成功');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
        $settlement   = Settlement::find((int)$id);
        if ($settlement) {
            $settlement->delete();
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
        $settlement   = Settlement::find( (int)$id );
        $search       = $request->get('search');
        $user_id      = ltrim( $settlement->user_id, ',');
        $MapUser      = explode( ',', rtrim($user_id, ",") );
        if( empty($search) ){
            $MemberList   = Member::select('id','user_name','user_nickname','created_at','user_role','user_phone')->whereIn('id', $MapUser)->paginate(10);
        }else{
            $MemberList   = Member::select('id','user_name','user_nickname','created_at','user_role','user_phone')->where('user_name', 'LIKE', '%' .$search. '%')->orwhere('user_nickname', 'LIKE', '%'.$search.'%')->paginate(10);
        }
        return view('admin.settlement.member', array('id'=>$id, 'list'=>$MemberList, 'mapuser'=>$MapUser, 'project_id'=>$settlement['project_id'], 'fid'=>$settlement['fid']));
    }



    /**
     * 追加项目会员
     *
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function user_add( Request $request, $id){
        $settlement         = Settlement::find( (int)$id );
        $user_id            = $request->get('user_id');
        $row                = $settlement->user_id;
        if( empty($row) ){
            $row            = ','.$user_id.',';   //追加会员
        }else{
            $row            = $row.$user_id.',';   //追加会员
        }
        $settlement->user_id    = $row;
        $settlement->save();
        return redirect("/admin/settlement/$id/user")->withSuccess('添加成功！');
    }


    /**
     * 删除项目会员
     *
     * @param Request $request
     * @param $id
     * @return mixed
     */
    public function user_del( Request $request, $id){
        $settlement         = Settlement::find( (int)$id );
        $user_id            = $request->get('user_id');
        $row                = ltrim(rtrim($settlement->user_id, ','), ',');
        $row                = explode(',', $row);
        $key                = array_search($user_id, $row);
        unset($row[$key]);
        $settlement->user_id   = ','.implode(',', $row).',';
        $settlement->save();
        return redirect("/admin/settlement/$id/user")->withSuccess('成功！');
    }
}
