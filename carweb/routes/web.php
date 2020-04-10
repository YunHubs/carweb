<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

//Route::get('test',function (){
//    return view('admin.test');
//});

//前端页面显示路由
Route::get('/','ShowPageController@index');
Route::get('carsafe','ShowPageController@carsafe');
Route::get('aboutus','ShowPageController@aboutus');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//后端管理路由
Route::get('/admin/{opname}','AdminPageController@showIndex');    //显示列表
Route::post('/admin/{opname}','AdminPageController@store');       //新增用户
Route::post('/admin/edit/{opname}/{id}','AdminPageController@update');    //编辑用户
Route::get('/admin/del/{opname}/{id}','AdminPageController@del');     //删除用户


