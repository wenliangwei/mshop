<?php

namespace App\Http\Middleware;

use Closure;

class liu
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
        if (!$request->session()->get('register_id')) {
            return redirect('/liu/login');
        }
        return $next($request);
    }
}
