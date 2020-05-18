<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $table = 'products';
    protected $fillable = [
        'name','slug','image','decription','price','sale','detail','quantity','status','cate_id'
    ];
    public $timestamp = true;


}
