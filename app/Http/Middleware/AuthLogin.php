<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class AuthLogin 
{
    protected function redirectTo($request, Closure $next)
    {
        // 如果不是管理员或者没有登录;则重定向到登录页面
        if (!Auth::guard('social')->check() || Auth::guard('social')->is_admin() != 1) {
            return route('/');
        }

        return $next($request);
    }
}
