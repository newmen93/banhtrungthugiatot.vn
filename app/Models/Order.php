<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\OrderDetail;

class Order extends Model
{
    //
    public function orderDetail()
    {
        return $this->hasMany(OrderDetail::class, 'order_id', 'k_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'k_id');
    }
}
