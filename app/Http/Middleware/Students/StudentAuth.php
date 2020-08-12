<?php

namespace App\Http\Middleware\Students;

use Closure;

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
        if(! auth('student')->check())
            return redirect(route('home'));
        return $next($request);
    }
}
