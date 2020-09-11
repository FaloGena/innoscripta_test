<?php

namespace App\Http\Controllers;

use App\Helpers\OrderHelper;
use App\Http\Requests\CartRequest;
use App\Traits\Cart;
use App\Traits\Delivery;
use Illuminate\Http\Request;

class CartController extends Controller
{
    use Cart, Delivery;

    public function index()
    {
        $order = session('order_items', []);
        $products = OrderHelper::getProductsByOrder($order);
        $deliveryCost = $this->getDeliveryCost();

        return view('cart')->with(['products' => $products, 'deliveryCost' => $deliveryCost]);
    }

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
