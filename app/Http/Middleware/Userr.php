<?php

namespace App\Http\Middleware;

use Closure;

class Userr
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
        if (!(Auth::user()->level == 'userr')){
            return redirect()->back();
        }
        {
        return $next($request);
        }
    }
}
