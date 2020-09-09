<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Models\Product;
use App\Traits\Cart;
use App\Traits\Currency;
use Illuminate\Http\Request;

class CartController extends Controller
{
    use Currency, Cart;

    public function changeCartAmount(CartRequest $request)
    {
        $id = $request->get('id');
        $operation = $request->get('operation');
        $amount = $this->operate($operation, $id);

        $product = Product::find($id);
        $currency = $this->getCurrency();
        $priceColumn = "price_".$currency;
        $price = $product->$priceColumn;

//        $item = collect([$id => $amount]);

        $request->session()->put('order_items.'.$id, $amount);
        \Session::save();

        return response()->json(['id'=>$id, 'amount'=>$amount]);
    }
}
