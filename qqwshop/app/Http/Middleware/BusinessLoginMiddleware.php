<?php

namespace App\Http\Middleware;

use Closure;

class BusinessLoginMiddleware
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
        if(!session('business') || session('business')==""){
            return redirect()->route('business.login');
        }
        return $next($request);
    }
}
