<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class CheckLogin 
{
    public function handle($request, Closure $next)
    {
        // 如果已经登陆;则重定向首页
        if (Auth::guard('social')->check()) {
            return redirect('/');
        }

        return $next($request);
    }
}
