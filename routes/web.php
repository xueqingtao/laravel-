<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




//登陆页面
Route::get('admin/login','Admin\LoginController@index');
//执行登陆
Route::post('admin/doLogin','Admin\LoginController@doLogin');

//用户退出‘

Route::get('admin/logout','Admin\LoginController@logout');


//管理后台RBAC功能类的路由组
Route::prefix('admin')->group(function (){
    //管理后台首页
    Route::get('home','Admin\HomeController@home')->name('admin.home');
});