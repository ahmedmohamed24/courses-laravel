<?php

namespace App\Http\Middleware\Students;

use Closure;
use Illuminate\Support\Facades\Auth;

class StudentAuth
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
        if(! Auth('student')->check())
            return redirect(route('home'));
        return $next($request);
    }
}
