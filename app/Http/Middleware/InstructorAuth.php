<?php

namespace App\Http\Middleware;

use Closure;

class InstructorAuth
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
        if(Auth('instructor')->check())
            return $next($request);
        else
            return redirect(route('home'));
    }
}
