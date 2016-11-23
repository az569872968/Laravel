<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/',function(){
    return view('home');
});

Route::get('/home',function(){
    return view('welcome');
});

Route::get('admin/index', ['as' => 'admin.index', 'middleware' => ['auth','menu','web'], 'uses'=>'Admin\\IndexController@index']);

$this->group(['namespace' => 'Admin','prefix' => '/admin',], function () {
    Route::auth();
});

$router->group(['namespace' => 'Admin', 'middleware' => ['auth','menu','web','authAdmin']], function () {
    //权限管理路由
    Route::get('admin/permission/{cid}/create', ['as' => 'admin.permission.create', 'uses' => 'PermissionController@create']);
    Route::get('admin/permission/{cid?}', ['as' => 'admin.permission.index', 'uses' => 'PermissionController@index']);
    Route::post('admin/permission/index', ['as' => 'admin.permission.index', 'uses' => 'PermissionController@index']); //查询
    Route::resource('admin/permission', 'PermissionController');
    Route::put('admin/permission/update', ['as' => 'admin.permission.edit', 'uses' => 'PermissionController@update']); //修改
    Route::post('admin/permission/store', ['as' => 'admin.permission.create', 'uses' => 'PermissionController@store']); //添加


    //角色管理路由
    Route::get('admin/role/index', ['as' => 'admin.role.index', 'uses' => 'RoleController@index']);
    Route::post('admin/role/index', ['as' => 'admin.role.index', 'uses' => 'RoleController@index']);
    Route::resource('admin/role', 'RoleController');
    Route::put('admin/role/update', ['as' => 'admin.role.edit', 'uses' => 'RoleController@update']); //修改
    Route::post('admin/role/store', ['as' => 'admin.role.create', 'uses' => 'RoleController@store']); //添加


    //用户管理路由
    Route::get('admin/user/manage', ['as' => 'admin.user.manage', 'uses' => 'UserController@index']);  //用户管理
    Route::post('admin/user/index', ['as' => 'admin.user.index', 'uses' => 'UserController@index']);
    Route::resource('admin/user', 'UserController');
    Route::put('admin/user/update', ['as' => 'admin.user.edit', 'uses' => 'UserController@update']); //修改
    Route::post('admin/user/store', ['as' => 'admin.user.create', 'uses' => 'UserController@store']); //添加

    //新闻管理路由
    Route::get('admin/article/manage', ['as' => 'admin.article.manage', 'uses' => 'ArticleController@index']);  //内容管理
    Route::post('admin/article/index', ['as' => 'admin.article.index', 'uses' => 'ArticleController@index']);
    Route::resource('admin/article', 'ArticleController');
    Route::put('admin/article/update', ['as' => 'admin.article.edit', 'uses' => 'ArticleController@update']); //修改
    Route::post('admin/article/store', ['as' => 'admin.article.create', 'uses' => 'ArticleController@store']); //添加

    //工程项目路由
    Route::post('admin/project/index', ['as' => 'admin.project.index', 'uses' => 'ProjectController@index']);
    Route::resource('admin/project', 'ProjectController');
    Route::put('admin/project/update', ['as' => 'admin.project.edit', 'uses' => 'ProjectController@update']); //修改
    Route::post('admin/project/store', ['as' => 'admin.project.create', 'uses' => 'ProjectController@store']); //添加
    Route::get('admin/project/{id?}/user', ['as' => 'admin.project.user', 'uses' => 'ProjectController@user']); //会员列表
    Route::get('admin/project/{id}/user_add', ['as' => 'admin.project.user_add', 'uses' => 'ProjectController@user_add']); //会员列表
    Route::get('admin/project/{id}/user_del', ['as' => 'admin.project.user_del', 'uses' => 'ProjectController@user_del']); //会员列表

    //招标文件路由
    Route::get('admin/tender/index/{id}', ['as' => 'admin.tender.index', 'uses' => 'TenderController@index']);
    Route::put('admin/tender/update', ['as' => 'admin.tender.edit', 'uses' => 'TenderController@update']); //修改
    Route::post('admin/tender/store', ['as' => 'admin.tender.create', 'uses' => 'TenderController@store']); //添加

    //会员管理路由
    Route::get('admin/member/index', ['as' => 'admin.member.index', 'uses' => 'MemberController@index']);
    Route::resource('admin/member', 'MemberController');
    Route::put('admin/member/update', ['as' => 'admin.member.edit', 'uses' => 'MemberController@update']); //修改
    Route::post('admin/member/store', ['as' => 'admin.member.create', 'uses' => 'MemberController@store']); //添加
});

Route::get('admin', function () {
    return redirect('/admin/index');
});


Route::auth();



