<?php


namespace App\Helpers;


use App\Models\Product;
use App\Traits\Currency;

class OrderHelper extends BaseHelper
{

    /**
     * By session order information (order_items) calculates
     * and returns total amount of products in it
     *
     * @param array $session_order
     * @return int
     */
    public static function getTotalAmount ($session_order)
    {
        $total = 0;
        if ($session_order !== null)
            foreach ($session_order as $item=>$amount) $total += $amount;

        return $total;
    }

    /**
     * By session order information (order_items) calculates
     * and returns total price of products in it
     *
     * @param array $session_order
     * @return float|int
     */
    public static function getTotalPrice ($session_order)
    {
        $total_price = 0;
        if ($session_order !== null) {
            $products = [];
            foreach ($session_order as $id => $amount) $products[] = $id;
            $products = Product::find($products);
            foreach ($products as $product) $total_price += $session_order[$product->id] * $product->getPrice();
        }

        return $total_price;
    }
}
