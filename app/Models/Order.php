<?php

namespace App\Models;

use App\Helpers\OrderHelper;
use App\Traits\Currency;
use App\Traits\StoringOrderItems;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Order extends Model
{
    use StoringOrderItems, Currency;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'phone', 'name', 'surname', 'comment', 'email', 'address', 'user_id'
    ];

    public function createByForm()
    {
        if ($user = Auth::user()) {
            $this->user_id = $user->id;
        }
        $orderItems = session('order_items', []);
        $this->price = OrderHelper::getTotalPrice($orderItems);
        $orderItems = $this->orderItemsAsJSON($orderItems);
        $this->products = $orderItems;
        $this->currency = $this->getCurrency();
        $this->save();
    }
}
