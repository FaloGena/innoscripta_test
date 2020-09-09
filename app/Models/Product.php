<?php

namespace App\Models;

use App\Traits\Currency;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use Currency;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'type', 'price_usd', 'price_eur', 'description', 'weight'
    ];

    public function getAll()
    {

        $items = $this->all();

        return $items;
    }

    public function getPrice()
    {

        $currency = $this->getCurrency();
        $priceColumn = "price_".$currency;

        return $this->$priceColumn;
    }
}
