<?php

namespace App\Http\Middleware\Students;

use Closure;

class StudentRedirectAuth
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
        if( ! auth('student')->check())
            return $next($request);
        return redirect(route('home'));
    }
}
