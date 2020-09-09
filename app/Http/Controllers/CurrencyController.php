<?php

namespace App\Http\Controllers;

use App\Http\Requests\CurrencyRequest;
use App\Traits\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    use Currency;

    public function change(CurrencyRequest $request)
    {
       $currency = $this->setCurrency($request);

       return response()->json(['currency' => $currency]);
    }
}
