<?php


namespace App\Helpers;


use App\Models\Product;
use App\Traits\Currency;

class OrderHelper extends BaseHelper
{

    use Currency;

    public static function getTotalAmount ($session_order)
    {
        $total = 0;
        foreach ($session_order as $item=>$amount) $total += $amount;

        return $total;
    }

    public static function getTotalPrice ($session_order)
    {

        $products = [];
        foreach ($session_order as $id=>$amount) $products[] = $id;
        $products = Product::find($products);
        $total_price = 0;
        foreach ($products as $product) $total_price += $session_order[$product->id] * $product->getPrice();

        return $total_price;
    }
}
