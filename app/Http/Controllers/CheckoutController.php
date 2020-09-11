<?php

namespace App\Http\Controllers;

use App\Helpers\AddressHelper;
use App\Http\Requests\CheckoutRequest;
use App\Models\Address;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{

    public function index()
    {
        $addresses = ($user = Auth::user()) ? $user->addresses : [];
        return view('checkout')->with('addresses', $addresses);
    }

    public function save(CheckoutRequest $request)
    {
        $data = AddressHelper::addressToRequest($request);
        if (!is_array($data)) return $data;
        $order = Order::create($data);
        $order->createByForm();

        $request->session()->forget('order_items');
        return response()->json(['order'=>$order]);
    }
}
