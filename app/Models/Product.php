<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $fillable = [
        'name','slug','image','description','price','sale','detail','quantity','status','slides_id','cate_id'
    ];
    public $timestamp = true;


}
