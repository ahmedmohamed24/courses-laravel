<?php

namespace App\Http\Middleware\API;

use Closure;
use App\traits\AjaxResponse;

class CheckApiPassword
{
    use AjaxResponse;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->apiPassword !== env("API_PASSWORD",'ahmed12345')){
            return $this->response(false,"You are not authenticated to access this API");
        }
        return $next($request);
    }
}
