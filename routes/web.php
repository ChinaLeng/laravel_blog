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
/*Route::get('/', function () {
    return view('welcome');
});*/
//前台
Route::namespace('Index')->group(function(){
	Route::get('/','IndexController@index');
	Route::get('/about','IndexController@about')->name('index.about');
	Route::get('/topics/{id}/{slug?}','IndexController@topics')->name('index.topics');
	Route::get('/checklogin','IndexController@checkLogin')->name('index.checklogin');
	Route::post('/comment','IndexController@comment')->name('index.comment');
	Route::get('/file','IndexController@file')->name('index.file');
	Route::post('/message','IndexController@message')->name('index.message');
	Route::any('/wechat', 'WeChatController@serve');
	Route::any('/callback', 'WeChatController@callback');
	Route::get('/list/{tagid?}','IndexController@tagArticleList')->name('index.list');
	Route::get('/friend','IndexController@friend')->name('index.friend');
});
//后台
Route::namespace('Admin')->prefix('admins')->middleware('auth.login')->group(function(){
	//后台首页
	Route::get('/', 'IndexController@index')->name('admins.home');
	//图片上传
	Route::post('/upimg', 'BaseController@UpImg')->name('admins.upimg');
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
		Route::post('/store', 'ArticleController@store')->name('admins.article.store');
		//文章编辑
		Route::get('/edit/{article}', 'ArticleController@edit')->name('admins.article.edit');
		Route::post('/update/{article}', 'ArticleController@update')->name('admins.article.update');
		//文章删除
		Route::get('/del/{article}', 'ArticleController@del')->name('admins.article.del');
	});
	Route::prefix('comment')->group(function () {
		//评论列表
		Route::get('/', 'CommentController@index')->name('admins.comment.index');
		//评论隐藏
		Route::get('/hide/{id}', 'CommentController@hide')->name('admins.comment.hide');
		//评论显示
		Route::get('/show/{id}', 'CommentController@show')->name('admins.comment.show');
	});
	Route::prefix('message')->group(function () {
		//留言板列表
		Route::get('/', 'MessageController@index')->name('admins.message.index');
		//留言板隐藏
		Route::get('/hide/{id}', 'MessageController@hide')->name('admins.message.hide');
		//留言板显示
		Route::get('/show/{id}', 'MessageController@show')->name('admins.message.show');
		//删除留言
		Route::get('/del/{id}','MessageController@del')->name('admins.message.del');
	});
	Route::prefix('friend')->group(function () {
		//友链列表
		Route::get('/', 'FriendController@index')->name('admins.friend.index');
		//删除友链
		Route::get('/hide/{id}', 'FriendController@hide')->name('admins.friend.hide');
		//新增友链
		Route::get('/show', 'FriendController@show')->name('admins.friend.show');
		Route::post('/store', 'FriendController@store')->name('admins.friend.store');
		//编辑
		Route::get('/edit/{id}', 'FriendController@edit')->name('admins.friend.edit');
		Route::post('/update/{id}', 'FriendController@update')->name('admins.friend.update');
	});
	Route::prefix('user')->group(function () {
		//用户列表
		Route::get('/', 'SocialUsersController@index')->name('admins.user.index');
	});
});
//第三方登录
Route::namespace('Auth')->prefix('auth')->middleware('auth.checklogin')->group(function(){
	//重定向
	Route::get('/login/github', 'ThirdLoginController@redirectToProvider')->name('login.github');;
	//登录
	Route::get('/login/git/callback', 'ThirdLoginController@handleProviderCallback');
	//重定向
	Route::get('/login/weibo', 'ThirdLoginController@redirectToProviderWei')->name('login.weibo');
	//登录
	Route::get('/login/weibo/callback', 'ThirdLoginController@handleProviderCallbackWei');
	//重定向
	Route::get('/login/weixin', 'ThirdLoginController@redirectToProviderWeixin');
	//登录
	Route::get('/login/weixin/callback', 'ThirdLoginController@handleProviderCallbackWeixin');
	//重定向
	Route::get('/login/qq', 'ThirdLoginController@redirectToProviderQq')->name('login.qq');
	//登录
	Route::get('/login/qq/callback', 'ThirdLoginController@handleProviderCallbackQq');
});
