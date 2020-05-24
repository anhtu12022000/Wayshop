<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'delivery_address';
    protected $fillable = ['user_id','user_email','name','address','country','pincode','mobile'];
    
}
