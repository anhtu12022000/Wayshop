<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Test2 extends Model
{
    protected $table = 'billDetail'; 
    protected $filable = ['bill_id','product_id','price','quantity'];
    public $timestamp = false;
}
