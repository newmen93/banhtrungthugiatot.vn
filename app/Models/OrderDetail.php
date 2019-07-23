<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use App\Models\Product;

class OrderDetail extends Model
{
    //
    public function order() {
        return $this->belongsTo(Order::class, 'order_id', 'k_id');
    }

    public function product() {
        return $this->hasOne(Product::class, 'k_id', 'product_id');
    }
}
