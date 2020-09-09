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

        return $this->operate($operation, $id);
    }
}
