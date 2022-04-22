<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckUserType
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $user_type_1 = null, $user_type_2 = null, $user_type_3= null)
    {
        if (auth()->user()->user_type == $user_type_1 || auth()->user()->user_type == $user_type_2 || auth()->user()->user_type == $user_type_3) {
            return $next($request);
        }

        if ($user_type_1 == '0' || $user_type_2 == '1' || $user_type_1 == '4') {
            return redirect('/employer-login');
        }
        if ($user_type_1 == '2') {
            return redirect('/job-login');
        }
        if ($user_type_1 == '3') {
            return redirect('/admin_login');
        }
    }
}