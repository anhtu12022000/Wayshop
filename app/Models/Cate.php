<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cate extends Model
{
    protected $table = 'cate';
    protected $primaryKey = 'id';
    protected $fillable = ['name','slug'];
    public $timestamp = true;

    public function product()
    {
    	return $this->hasMany('App\Models\Product', 'cate_id');
    }
}
