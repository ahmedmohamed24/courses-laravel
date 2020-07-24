<?php

namespace App\Http\Middleware;

use Closure;

class InstructorEmailVerifyMiddleware
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
        if(Auth('instructor')->user()->email_verified_at === null){
            session()->put('MustVerifyEmail','hello');
            return redirect(route('home'));
        }
        return $next($request);
    }
}
