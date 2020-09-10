<?php


namespace App\Helpers;


use App\Models\Product;
use App\Traits\Currency;
use Illuminate\Support\Collection;

class OrderHelper extends BaseHelper
{

    /**
     * By session order information (order_items) calculates
     * and returns total amount of products in it
     *
     * @param array $session_order
     * @return int
     */
    public static function getTotalAmount($session_order)
    {
        $total = 0;
        foreach ($session_order as $item => $amount) $total += $amount;

        return $total;
    }

    /**
     * By session order information (order_items) calculates
     * and returns total price of products in it
     *
     * @param array $session_order
     * @return float|int
     */
    public static function getTotalPrice($session_order)
    {
        $total_price = 0;
        $products = self::getProductsByOrder($session_order);
        foreach ($products as $product) $total_price += $session_order[$product->id] * $product->getPrice();

        return $total_price;
    }

    /**
     * By session order (product ids) returns their model instances
     *
     * @param array $session_order
     * @return Product|\Illuminate\Database\Eloquent\Collection
     */
    public static function getProductsByOrder($session_order)
    {
        $products = [];
        foreach ($session_order as $id => $amount) $products[] = $id;
        $products = Product::find($products);

        return $products;
    }
}
