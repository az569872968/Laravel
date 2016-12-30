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


//后台首页
Route::get('admin/index', ['as' => 'admin.index', 'middleware' => ['auth','menu','web'], 'uses'=>'Admin\\IndexController@index']);

//前台首页
Route::group(['middleware' => ['web']], function () {
    Route::get('/', ['as' => 'home.index', 'uses'=>'Home\\IndexController@index']);
    Route::post('home/index/login', ['as' => 'home.index.login', 'uses'=>'Home\\IndexController@Login']);
    Route::get('home/index/loginout', ['as' => 'home.index.loginout', 'uses'=>'Home\\IndexController@loginout']);

});



$this->group(['namespace' => 'Admin','prefix' => '/admin',], function () {
    Route::auth();
});


//前台路由
$router->group(['namespace' => 'Home', 'middleware' => ['web', 'auth.home']], function (){
    Route::get('home/project/index', ['as' => 'home.project.index', 'uses' => 'ProjectController@index']);
    Route::get('home/project/show', ['as' => 'home.project.show', 'uses' => 'ProjectController@show']);
    Route::get('home/project/summary', ['as' => 'home.project.summary', 'uses' => 'ProjectController@summary']);

    Route::get('home/tender/index', ['as' => 'home.tender.index', 'uses' => 'TenderController@index']);

    Route::get('home/contract/index', ['as' => 'home.contract.index', 'uses' => 'ContractController@index']);

    Route::get('home/settlement/index', ['as' => 'home.settlement.index', 'uses' => 'SettlementController@index']);
});


//后台路由
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

    //友情链接路由
    Route::post('admin/link/index', ['as' => 'admin.link.index', 'uses' => 'LinkController@index']);
    Route::resource('admin/link', 'LinkController');
    Route::put('admin/link/update', ['as' => 'admin.link.edit', 'uses' => 'LinkController@update']); //修改
    Route::post('admin/link/store', ['as' => 'admin.link.create', 'uses' => 'LinkController@store']); //添加

    //工程项目路由
    Route::post('admin/project/index', ['as' => 'admin.project.index', 'uses' => 'ProjectController@index']);
    Route::resource('admin/project', 'ProjectController');
    Route::put('admin/project/update', ['as' => 'admin.project.edit', 'uses' => 'ProjectController@update']); //修改
    Route::any('admin/project/store', ['as' => 'admin.project.create', 'uses' => 'ProjectController@store']); //添加
    Route::get('admin/project/{id?}/user', ['as' => 'admin.project.user', 'uses' => 'ProjectController@user']); //会员列表
    Route::get('admin/project/{id}/user_add', ['as' => 'admin.project.user_add', 'uses' => 'ProjectController@user_add']); //会员列表
    Route::get('admin/project/{id}/user_del', ['as' => 'admin.project.user_del', 'uses' => 'ProjectController@user_del']); //会员列表
    Route::get('admin/project/{id?}/summary', ['as' => 'admin.project.summary', 'uses' => 'ProjectController@summary']);

    //招标文件路由
    Route::get('admin/tender/index', ['as' => 'admin.tender.index', 'uses' => 'TenderController@index']);
    Route::resource('admin/tender', 'TenderController');
    Route::put('admin/tender/update', ['as' => 'admin.tender.edit', 'uses' => 'TenderController@update']); //修改
    Route::any('admin/tender/store', ['as' => 'admin.tender.create', 'uses' => 'TenderController@store']); //添加

    //合同文件路由
    Route::get('admin/contract/index', ['as' => 'admin.contract.index', 'uses' => 'ContractController@index']);
    Route::resource('admin/contract', 'ContractController');
    Route::put('admin/contract/update', ['as' => 'admin.contract.edit', 'uses' => 'ContractController@update']); //修改
    Route::any('admin/contract/store', ['as' => 'admin.contract.create', 'uses' => 'ContractController@store']); //添加

    //会员管理路由
    Route::post('admin/member/index', ['as' => 'admin.member.index', 'uses' => 'MemberController@index']);
    Route::resource('admin/member', 'MemberController');
    Route::put('admin/member/update', ['as' => 'admin.member.edit', 'uses' => 'MemberController@update']); //修改
    Route::post('admin/member/store', ['as' => 'admin.member.create', 'uses' => 'MemberController@store']); //添加


    //结算文件路由
    Route::get('admin/settlement/index', ['as' => 'admin.settlement.index', 'uses' => 'SettlementController@index']);
    Route::resource('admin/settlement', 'SettlementController');
    Route::put('admin/settlement/update', ['as' => 'admin.settlement.edit', 'uses' => 'SettlementController@update']);
    Route::any('admin/settlement/store', ['as' => 'admin.settlement.create', 'uses' => 'SettlementController@store']);


    //首页图片管理理由
    Route::get('admin/homeimage/manage', ['as' => 'admin.homeimage.manage', 'uses' => 'HomeImageController@index']);  //内容管理
    Route::resource('admin/homeimage', 'HomeImageController');
    Route::post('admin/homeimage/update', ['as' => 'admin.homeimage.edit', 'uses' => 'HomeImageController@update']); //修改


    //结算
    Route::get('admin/budget/index',['as'=>'admin.budget.index','uses'=>'budgetController@index']);
    //下载文件路由
    Route::resource('admin/common/download', 'CommonController@download');

});

Route::get('admin', function () {
    return redirect('/admin/index');
});



Route::auth();



