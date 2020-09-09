<?php


namespace App\Traits;


use App\Models\Product;

trait Cart
{

    /**
     * Using given product id and operation type
     * changes session value for order_items.
     * Returns response with product info to front if operation could be done
     * otherwise returns 422 error.
     *
     * @param string $operation Could be 'add' or 'remove'
     * @param int $item_id
     * @return \Illuminate\Http\JsonResponse
     */
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

        // Special cases
        if ($amount == 0) { // We don't want to store product info with 0 amount
            unset($order[$item_id]);
            \Session::put('order_items', $order);
            \Session::save();
            return $response;
        }
        if ($amount == -1) return response()->json(['errors' => [['You have nothing to remove']] ], 422);

        \Session::put('order_items.' . $item_id, $amount);
        \Session::save();

        return $response;
    }
}
