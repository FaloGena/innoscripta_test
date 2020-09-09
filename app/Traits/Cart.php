<?php


namespace App\Traits;


trait Cart
{

    public function operate ($operation, $item_id)
    {
        $order = session('order_items');
        $amount = $order[$item_id] ?? 0;

        $amount += ($operation == 'add') ? 1 : -1;
        if ($amount == 0) {
            unset($order[$item_id]);
            session('order_items', $order);
            \Session::save();
            return response()->json(['id'=>$item_id, 'amount'=>0]);
        }
        if ($amount == -1) return response()->json(['error' => 'You have nothing to remove'], 422);

        return $amount;
    }
}
