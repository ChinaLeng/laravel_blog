<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1', 'namespace' => 'Api', 'as' => 'api.'],function () {
		//获取文章列表
		Route::get('/article','ArticleController@index');
		//获取置顶文章
		Route::get('/articleTop','ArticleController@indexTop');
		//获取文章详情
		Route::get('/show/{id}','ArticleController@show');
		//文章归档
		Route::get('/file','ArticleController@file');
    });
