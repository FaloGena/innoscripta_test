<?php

namespace App\Http\Controllers;

use App\Helpers\OrderHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $addresses = $user->addresses;
        $orders = $user->orders;
        foreach ($orders as $order) {
            $items = json_decode($order->products, true);
            $products = OrderHelper::getProductsByOrder($items);
            foreach ($products as $product) $product->amount = $items[$product->id];
            $order->products = $products;
        }

        return view('profile')->with(['user'=>$user, 'orders'=>$orders, 'addresses'=>$addresses]);
    }
}
