<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class addShop
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
        if(Auth::user()->shop!=null)
        {
            if(Auth::user()->shop->count()>=1)
            {
                return redirect('/');
            }
        }
        return $next($request);
    }
}
