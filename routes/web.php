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
Route::get('/', function () {
    return view('welcome');
});
//后台
Route::namespace('Admin')->prefix('admins')->group(function(){
	//后台首页
	Route::get('/', 'IndexController@index')->name('admins.home');
	//标签模块
	Route::prefix('tag')->group(function () {
		//标签首页
		Route::get('/index', 'TagController@index')->name('admins.tag.index');
		//标签新增
		Route::get('/create', 'TagController@create')->name('admins.tag.create');
		Route::post('/store', 'TagController@store')->name('admins.tag.store');
		//标签编辑
		Route::get('/edit/{tag}', 'TagController@edit')->name('admins.tag.edit');
		Route::post('/update/{tag}', 'TagController@update')->name('admins.tag.update');
		//标签删除
		Route::get('/del/{tag}', 'TagController@del')->name('admins.tag.del');
	});
		//文章模块
	Route::prefix('article')->group(function () {
		//文章首页
		Route::get('/index', 'ArticleController@index')->name('admins.article.index');
		//文章新增
		Route::get('/create', 'ArticleController@create')->name('admins.article.create');
		Route::post('/store', 'TagController@store')->name('admins.tag.store');
		//标签编辑
		Route::get('/edit/{tag}', 'TagController@edit')->name('admins.tag.edit');
		Route::post('/update/{tag}', 'TagController@update')->name('admins.tag.update');
		//标签删除
		Route::get('/del/{tag}', 'TagController@del')->name('admins.tag.del');
	});
});
/*Route::get('login/github', 'Auth\ThirdLoginController@redirectToProvider');
Route::get('login/git/callback', 'Auth\ThirdLoginController@handleProviderCallback');*/
