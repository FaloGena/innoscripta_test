<?php


namespace App\Traits;


trait StoringOrderItems
{

    public function orderItemsAsJSON($session_order = [])
    {
        $order = ($session_order == []) ? session('order_items', []) : $session_order;
        $order = json_encode($order);

        return $order;
    }
}
