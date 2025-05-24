<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Modules\Payment\Traits\ShoppingCartTrait;

class CheckEmptyCart
{
    public function handle($request, Closure $next, $guard = null)
    {
        if (count(ShoppingCartTrait::content()) <= 0) {
            return redirect()->route('front.cart.index');
        }

        return $next($request);
    }
}
