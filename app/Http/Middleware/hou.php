<?php

namespace App\Http\Middleware;

use Closure;

class hou
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
            return redirect('/admin/login');
        }
        return $next($request);
    }
}
