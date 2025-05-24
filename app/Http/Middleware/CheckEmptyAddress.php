<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckEmptyAddress
{
    public function handle($request, Closure $next, $guard = null)
    {
        if (!session()->get('address')) {
            return redirect()->route('front.checkout.index');
        }

        return $next($request);
    }
}
