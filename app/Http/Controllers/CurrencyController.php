<?php

namespace App\Http\Controllers;

use App\Http\Requests\CurrencyRequest;
use App\Traits\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    use Currency;

    /**
     * Receives desired currency and passes it to Currency trait
     *
     * @param CurrencyRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function change(CurrencyRequest $request)
    {
       $currency = $this->setCurrency($request);

       return response()->json(['currency' => $currency]);
    }
}
