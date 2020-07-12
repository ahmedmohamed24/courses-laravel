<?php

namespace App\Http\Middleware;

use Closure;

class VerifyEmailMiddleware
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
            session()->flash('MustVerifyEmail',true);
            return redirect(route('home'));
        }
        return $next($request);
    }
}
