<?php

namespace App\Http\Controllers\Home;

use App\Models\Link;
use App\Models\Member;
use App\Models\Video;
use App\QiDian;
use Crypt;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Contracts\Encryption\DecryptException;

class IndexController extends Controller
{
    public function index()
    {
        $Link       = Link::get(); // 友情链接
        $video      = Video::paginate(5);
        return view('home.index.index', array('link'=>$Link, 'video'=>$video));
    }

    /**
     * 前台登录
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function Login(Request $request){
        $UserName   = $request->get('user_name');
        $UserPass   = $request->get('user_pass');
        $User       = Member::where('user_name', $UserName)->first();
        if( empty($User) || decrypt($User->user_pass) != $UserPass) {
            if ($request->ajax() && ($request->getMethod() != 'GET')) {
                return response()->json([
                    'status' => -1,
                    'code' => 403,
                    'msg' => '用户名或者密码错误'
                ]);
            }
        }
        session(['user'=>$User]);
        return response()->json([
            'status' => 1,
            'code' => 200,
            'msg' => '登录成功'
        ]);
    }


    /**
     * 退出登录
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function loginout(){
        session(['user'=>null]);
        return redirect('/');
    }

    public function info(){

    }
}
