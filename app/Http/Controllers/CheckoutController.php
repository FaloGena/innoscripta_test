<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckoutRequest;
use App\Models\Order;

class CheckoutController extends Controller
{

    public function index()
    {
        return view('checkout');
    }

    public function save(CheckoutRequest $request)
    {
        $data = $request->all();
        $order = Order::create($data);
        $order->createByForm();

        $request->session()->forget('order_items');
        return response()->json(['order'=>$order]);
    }
}
