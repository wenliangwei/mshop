<?php

namespace App\Http\Middleware;

use Closure;

class Login
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
        // if(!session('register_id')){
        //     return redirect('login/login');
        // }
        if (!$request->session()->get('register_id')) {
            return redirect('/login/login');
        }
        return $next($request);
    }
}
