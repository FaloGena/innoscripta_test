<?php


namespace App\Traits;


use App\Http\Requests\CurrencyRequest;
use App\Models\User;
use Illuminate\Http\Request;

trait Currency
{

    public function getCurrency()
    {
        return session('currency', 'usd');
    }

    public function setCurrency(CurrencyRequest $request)
    {
        $currency = $request->get('setCurrency', function () {
            return "usd";
        });
        $request->session()->put('currency', $currency);

        return $currency;
    }
}
