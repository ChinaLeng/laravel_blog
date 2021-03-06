<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Log;

class WeChatController extends Controller
{
	/**
     * 处理微信的请求消息
     *
     * @return string
     */
    public function serve()
    {
        Log::info('request arrived.');
        $app = app('wechat.official_account');
        $app->server->push(function($message){
            return "欢迎关注 陈政宽的个人博客";
        });

        return $app->server->serve();
    }
    public function callback()
	{  
	    Log::info('request arrived.');
	    $user_info = [];
	    $app = app('wechat.official_account');
	    $app->server->setMessageHandler(function($message) use ($app){
	        if ($message->MsgType=='event') {
	             $user_openid = $message->FromUserName;
	            if ($message->Event=='subscribe') {
	                $user_info['unionid'] = $message->ToUserName;
	                $user_info['openid'] = $user_openid;
	                $userService = $app->user;
	                $user = $userService->get($user_info['openid']);
	                $user_info['subscribe_time'] = $user['subscribe_time'];
	                $user_info['nickname'] = $user['nickname'];
	                $user_info['avatar'] = $user['headimgurl'];
	                $user_info['sex'] = $user['sex'];
	                $user_info['province'] = $user['province'];
	                $user_info['city'] = $user['city'];
	                $user_info['country'] = $user['country'];
	                $user_info['is_subscribe'] = 1;
	                dd($user_info);die;
	                if (WxStudent::weixin_attention($user_info)) {
	                    return '欢迎关注';
	                }else{
	                    return '您的信息由于某种原因没有保存，请重新关注';
	                }
	            }else if ($message->Event=='unsubscribe') {
	                if (WxStudent::weixin_cancel_attention($user_openid)) {
	                    return '已取消关注';
	                }
	            }
	        }
	        
	    });
	    
	    Log::info('return response.');
	     return $app->server->serve();
	}
}