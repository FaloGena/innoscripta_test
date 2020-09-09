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

    /**
     * Simply returns all rows from "products" table.
     * Free space to modify output rules
     *
     * @return Product[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        $items = $this->all();
        return $items;
    }

    /**
     * Gets current currency and returns appropriate price of product.
     *
     * @return float
     */
    public function getPrice()
    {
        $currency = $this->getCurrency();
        $priceColumn = "price_".$currency;

        return $this->$priceColumn;
    }
}
