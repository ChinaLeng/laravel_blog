<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Socialite;
use Illuminate\Http\Request;

class ThirdLoginController extends Controller
{
    /**
     * 将用户重定向到Github认证页面
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }
        /**
     * 从Github获取用户信息.
     *
     * @return Response
     */
    public function handleProviderCallback(Request $request,$service)
    {
        $user = Socialite::driver('github')->user();
        dd($user);
    }
}
