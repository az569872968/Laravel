<?php

namespace App\Http\Controllers\Home;

use App\Models\Member;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class LoginController extends Controller
{


    /**
     * 前台登录
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|\Illuminate\View\View
     */
    public function Login(Request $request){
        if(Input::all()){
            $UserName   = $request->get('user_name');
            $UserPass   = $request->get('user_pass');
            $User       = Member::where('user_name', '=', $UserName)->get();
            if( empty($User) || Crypt::decrypt($User->user_pass) != $UserPass) {
                if ($request->ajax() && ($request->getMethod() != 'GET')) {
                    return response()->json([
                        'status' => -1,
                        'code' => 403,
                        'msg' => '用户名或者密码错误'
                    ]);
                } else {
                    return back()->with('msg', '用户名或者密码错误！');
                }
            }
            session(['user'=>$User]);
            return redirect('home/index');
        }else{
            return view('home.home.index');
        }
    }


    /**
     * 退出登录
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function loginout(){
        session(['user'=>null]);
        return redirect('home/index');
    }
}
