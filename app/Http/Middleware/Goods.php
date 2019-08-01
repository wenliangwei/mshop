<?php

namespace App\Http\Middleware;

use Closure;

class Goods
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
        $time = date('H');
        if($time<9 || $time>17){
            return redirect('goods/edit');
        }
        return $next($request);
    }
}
