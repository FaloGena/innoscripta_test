<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
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

    public function get($name)
    {

        $item = $this->findOrFail($name);

        return $item;
    }
}
