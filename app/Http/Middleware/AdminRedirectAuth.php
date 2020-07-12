<?php

namespace App\Http\Middleware;

use Closure;

class AdminRedirectAuth
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
        if(Auth('admin')->check()){
            return redirect(route('admin.index'));
        }
        return $next($request);
    }
}
