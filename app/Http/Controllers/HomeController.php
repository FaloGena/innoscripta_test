<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index ()
    {
//        $pizza = [
//            'name' => 'Texas',
//            'type' => 'pizza',
//            'price_usd' => '6.86',
//            'price_eur' => '5.81',
//            'description' => 'Ham, aromatic bacon, chicken and spicy pepperoni with tender mozzarella and emmental.',
//            'weight' => '650'
//        ];
//        Product::create($pizza);
//dd();
        $pizzas = new Product();
        $pizzas = $pizzas->getAll();

        $order = session('order_items');

        return view('index')->with(['pizzas' => $pizzas, 'order' => $order]);
    }
}
