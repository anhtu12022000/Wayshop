<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductComment extends Model
{
    public $table = 'product_comments';
    public $fillable = ['author','email','body','product_id'];
    public $timestamp = true;
}
