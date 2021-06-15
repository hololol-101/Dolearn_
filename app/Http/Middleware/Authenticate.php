<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            //TODO: echo부분 route로 교체, vendor/laravel/framework/srx/illuminate/foundation/exceptions/handeler line 244 수정 (현재 return null 이라서 ?? 무조건 뒤에 실행)
            $request->session()->put('alert', "로그인 후 이용해주세요.");
            echo '<script> location.href = document.referrer;</script>';
            // echo '<script>alert("로그인 후 이용해주세요."); history.back();</script>';
            // return redirect()->route('main')->with('alert', '로그인 후 이용해주세요.');
        }
    }
}
