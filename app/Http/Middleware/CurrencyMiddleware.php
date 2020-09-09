<?php

namespace App\Http\Middleware;

use App\Traits\Currency;
use Closure;

class CurrencyMiddleware
{
    use Currency;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $currency = $this->getCurrency();
        view()->share('currency', $currency);
        return $next($request);
    }
}
