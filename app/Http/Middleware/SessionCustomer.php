<?php

namespace App\Http\Middleware;

use Closure;

class SessionCustomer
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
        if(session()->get("role")=="customer") {
            return $next($request);
        }
       // return abort(404);
       return redirect('logout'); 
    }
}
