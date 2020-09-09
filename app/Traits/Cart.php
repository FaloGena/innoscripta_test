<?php


namespace App\Traits;


use App\Models\Product;

trait Cart
{

    public function operate($operation, $item_id)
    {
        $order = session('order_items');
        $product = Product::find($item_id);
        $price = $product->getPrice();
        $amount = $order[$item_id] ?? 0;
        $change = ($operation == 'add') ? 1 : -1;
        $amount += $change;
        $response = response()->json([
            'id' => $item_id,
            'amount' => $amount,
            'price' => $price,
            'change' => $change
        ]);

        if ($amount == 0) {
            unset($order[$item_id]);
            \Session::put('order_items', $order);
            \Session::save();
            return $response;
        }
        if ($amount == -1) return response()->json(['error' => 'You have nothing to remove'], 422);

        \Session::put('order_items.' . $item_id, $amount);
        \Session::save();

        return $response;
    }
}
