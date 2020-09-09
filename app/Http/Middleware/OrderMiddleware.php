<?php

namespace App\Http\Middleware;

use App\Helpers\OrderHelper;
use Closure;

class OrderMiddleware
{
    /**
     * Handle an incoming request.
     * Uses Helper methods to calculate total order amount and price
     * to pass it to view
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $session_order = session('order_items');
        $total_amount = OrderHelper::getTotalAmount($session_order);
        $total_price = OrderHelper::getTotalPrice($session_order);

        $session_order['total_amount'] = $total_amount;
        $session_order['total_price'] = $total_price;

        view()->share('session_order', $session_order);
        return $next($request);
    }
}
