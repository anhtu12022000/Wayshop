<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $primaryKey = 'id';

    public function ordersPro()
    {
    	return $this->hasMany('App\Models\OrdersProduct', 'order_id'); 
    }
}
