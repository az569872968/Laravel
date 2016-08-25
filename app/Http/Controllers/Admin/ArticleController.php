<?php
/**
 * Created by PhpStorm.
 * User: zoudan916@163.com
 * Date: 2016/8/23
 * Time: 23:26
 */

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use Illuminate\Http\Request;

use App\Models\Role;
use App\Models\AdminUser as User;


use App\Http\Requests;
use App\Http\Controllers\Controller;

class ArticleController extends Controller{

    public function index(Request $request){

        if ($request->ajax()) {
        }
        return view('admin.Article.index');
    }

    public function show($id){
        //
    }
}