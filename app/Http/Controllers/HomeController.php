<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index ()
    {
//        $product = [
//            'name' => 'Cheese',
//            'type' => 'sauce',
//            'price_usd' => '0.27',
//            'price_eur' => '0.23',
//            'description' => 'Delicate cheese sauce Heinz in convenient portion packaging.',
//            'weight' => '25'
//        ];
//        Product::create($product);
//        dd();
        $product = new Product();
        $products = $product->getAll();

        return view('index')->with(['products' => $products]);
    }
}
