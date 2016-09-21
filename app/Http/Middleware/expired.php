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
                    $days_to_expire = Carbon::parse($shop->expiry_date);
                    if ($days_to_expire->isToday()) {
                        session([
                            'expires_in' => 0
                        ]);
                    } else if ($days_to_expire->isPast()) {
                        session([
                            'expires_in' => -1
                        ]);
                    } else if ($days_to_expire->isFuture()) {
                        if ($days_to_expire->diffInDays(Carbon::now()->startOfDay()) < 7) {
                            session([
                                'expires_in' => $days_to_expire->diffInDays(Carbon::now()->startOfDay())
                            ]);
                        } else {
                            session()->forget('expires_in');
                        }
                    }
                }
            }
        }
        return $next($request);
    }
}
