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
        $this->userInfo($user,$request->getClientIp(),3);
        // 如果session没有存储登录前的页面;则直接返回到首页
        return redirect(url('/'));

    }
    /**
     * 将用户重定向到weibo认证页面
     *
     * @return Response
     */
    public function redirectToProviderWei()
    {
        // 记录登录前的url
/*        $data = [
            'targetUrl' => URL::previous(),
        ];
        session($data);*/
        return Socialite::driver('weibo')->redirect();
    }
        /**
     * 从weixin获取用户信息.
     *
     * @return Response
     */
    public function handleProviderCallbackWei(Request $request)
    {
        if (!$request->has('state')) {
            return abort(404);
        }
        //获取用户信息
        $user = Socialite::driver('weibo')->user();
        $this->userInfo($user,$request->getClientIp(),2);
        // 如果session没有存储登录前的页面;则直接返回到首页
        return redirect(url('/'));

    }
    /**
     * 将用户重定向到weixinweb认证页面
     *
     * @return Response
     */
    public function redirectToProviderWeixin()
    {
        // 记录登录前的url
/*        $data = [
            'targetUrl' => URL::previous(),
        ];
        session($data);*/
        return Socialite::driver('weixinweb')->redirect();
    }
    /**
     * 将用户重定向到QQ认证页面
     *
     * @return Response
     */
    public function redirectToProviderQq()
    {
        // 记录登录前的url
/*        $data = [
            'targetUrl' => URL::previous(),
        ];
        session($data);*/
        return Socialite::driver('qq')->redirect();
    }
        /**
     * 从QQ获取用户信息.
     *
     * @return Response
     */
    public function handleProviderCallbackQq(Request $request)
    {
        if (!$request->has('code')) {
            return abort(404);
        }
        //获取用户信息
        $user = Socialite::driver('qq')->user();
        $this->userInfo($user,$request->getClientIp(),1);
        // 如果session没有存储登录前的页面;则直接返回到首页
        return redirect(url('/'));

    }




    public function userInfo($user,$ip,$type)
    {

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
                'last_login_ip' => $ip,
            ]);
        }else{
            //新增用户
            $userUp = SocialUser::create([
                'socialite_client_id'          => $type,
                'name'                         => $name,
                'avatar'                       => $user->avatar,
                'openid'                       => $user->id,
                'access_token'                 => $user->token,
                'last_login_ip'                => $ip,
                'email'                        => $user->email,
            ]);
            $user_id = $userUp->id;
        }
        Auth::guard('social')->loginUsingId($user_id, true);
    }
}
