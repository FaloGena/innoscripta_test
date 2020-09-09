<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index ()
    {
        $product = new Product();
        $products = $product->getAll();

        return view('index')->with(['products' => $products]);
    }
}
