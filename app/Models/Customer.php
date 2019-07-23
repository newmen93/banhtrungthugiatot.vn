<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Customer extends Model
{
    public function user()
    {
    	return $this->belongTo(User::class,'id', 'user_id');
    }
}
