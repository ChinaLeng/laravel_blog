<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class AuthLogin 
{
    public function handle($request, Closure $next)
    {
        // 如果不是管理员或者没有登录;则重定向首页
        if (!Auth::guard('social')->check() || Auth::guard('social')->user()->is_admin != 1) {
            return redirect('/');
        }

        return $next($request);
    }
}
