<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slides extends Model
{
    protected $table = 'slides';

    protected $primaryKey = 'id';

    public function product()
    {
    	return $this->hasMany('App\Models\Product', 'slide_id');
    }
}
