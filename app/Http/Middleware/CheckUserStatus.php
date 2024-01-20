<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserStatus
{
    public function handle($request, Closure $next)
    {
        // 檢查已登入用戶的 status
        if (Auth::check() && Auth::user()->status == 1) {
            Auth::logout(); // 登出用戶

            // 重定向到登入頁面並顯示錯誤消息
            return redirect('/login')->with('error', '您的帳戶尚未開通。');
        }

        return $next($request);
    }
}