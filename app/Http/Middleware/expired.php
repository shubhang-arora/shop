<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Auth;

class expired
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            if (Auth::user()->shop != null) {
                $shop = Auth::user()->shop;
                if ($shop->premium_shop && $shop->added && !$shop->deleted) {
                    if (Carbon::parse($shop->expiry_date)->diffInDays(Carbon::now()) < 7) {
                        session([
                            'expired' => true
                        ]);
                    } else {
                        session()->forget('expired');
                    }
                }
            }
        }
        return $next($request);
    }
}
