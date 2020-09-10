<?php


namespace App\Traits;


trait Delivery
{

    use Currency;

    public function getDeliveryCost()
    {
        $currency = $this->getCurrency();
        $deliveryCost = ($currency == 'usd') ? 5 : 4;

        return $deliveryCost;
    }
}
