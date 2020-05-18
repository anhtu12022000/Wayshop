<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    public $table = 'contacts';
    protected $fillable = [
        'name','email','title','body'
    ];
    public $timestamp = true;
}
