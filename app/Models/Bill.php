<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bills';
    protected $fillable = ['name','email','phone','address','total','note','shiping','status'];
    
}
