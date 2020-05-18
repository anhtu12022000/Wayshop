<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    public $table = 'cate';
    protected $fillable = [
        'name','slug'
    ];
    public $timestamp = true;
}
