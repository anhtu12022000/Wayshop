<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    protected $table = 'cate';
    protected $fillable = ['name','slug'];
    public $timestamp = true;
}
