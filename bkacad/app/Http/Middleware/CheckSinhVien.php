<?php

namespace App\Http\Middleware;
use Session;
use Closure;

class CheckSinhVien
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Session::has('ma_sinh_vien'))
        {
                return $next($request);
        }
        else{
                return redirect()->route('login_sinh_vien')->with('error','Mời bạn đăng nhập');
        }
    }
}
