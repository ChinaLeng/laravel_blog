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
    return view('admin.index.index');
});
Route::get('login/github', 'Auth\ThirdLoginController@redirectToProvider');
Route::get('login/git/callback/{service}', 'Auth\ThirdLoginController@handleProviderCallback');
