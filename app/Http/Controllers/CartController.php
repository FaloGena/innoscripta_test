<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Traits\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    use Cart;

    /**
     * Receives id of product and type of operation should be made (add or remove)
     * then passes it to Cart trait method
     *
     * @param CartRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function changeCartAmount(CartRequest $request)
    {
        $id = $request->get('id');
        $operation = $request->get('operation');

        return $this->operate($operation, $id);
    }
}
