<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfSessionExpired
{
    public function handle($request, Closure $next)
    {
        // 檢查用戶是否登入
        if (!Auth::check()) {
            // 如果用戶未登入，則重定向到登入頁面
            return redirect('/login');
        }

        return $next($request);
    }
}
