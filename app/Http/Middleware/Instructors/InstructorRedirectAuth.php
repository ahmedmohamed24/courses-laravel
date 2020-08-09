<?php

namespace App\Http\Middleware\Instructors;

use Closure;

class InstructorRedirectAuth
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
        if( ! auth('instructor')->check())
            return $next($request);
        return redirect(route('home'));
    }
}
