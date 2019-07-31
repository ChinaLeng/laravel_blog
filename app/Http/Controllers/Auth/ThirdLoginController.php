<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Socialite;
use Illuminate\Http\Request;
use App\Models\SocialUser;
use URL;
use Auth;

class ThirdLoginController extends Controller
{
    /**
     * 将用户重定向到Github认证页面
     *
     * @return Response
     */
    public function redirectToProvider()
    {
        // 记录登录前的url
/*        $data = [
            'targetUrl' => URL::previous(),
        ];
        session($data);*/
        return Socialite::driver('github')->redirect();
    }
        /**
     * 从Github获取用户信息.
     *
     * @return Response
     */
    public function handleProviderCallback(Request $request)
    {
        if (!$request->has('code')) {
            return abort(404);
        }
        //获取用户信息
        $user = Socialite::driver('github')->user();
        //判断用户是否存在
        $userWhere = [
            'socialite_client_id' =>3,
            'openid'              => $user->id,
        ];
        $userData = SocialUser::select('id')->where($userWhere)->first();
        $name = $user->nickname ?? $user->name;
        //如果存在 就更新
        if($userData){
            $user_id = $userData->id;
            //更新
            SocialUser::where('id',$user_id)->update([
                'name'          => $name,
                'access_token'  => $user->token,
                'last_login_ip' => $request->getClientIp(),
            ]);
        }else{
            //新增用户
            $userUp = SocialUser::create([
                'socialite_client_id'          => 3,
                'name'                         => $name,
                'avatar'                       => $user->avatar,
                'openid'                       => $user->id,
                'access_token'                 => $user->token,
                'last_login_ip'                => $request->getClientIp(),
                'email'                        => $user->email,
            ]);
            $user_id = $userUp->id;
        }
        Auth::guard('social')->loginUsingId($user_id, false);
        // 如果session没有存储登录前的页面;则直接返回到首页
        return redirect(url('/'));

    }
}
