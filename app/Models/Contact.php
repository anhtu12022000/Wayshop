<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
<<<<<<< HEAD
    protected $table = 'contact';

    protected $primaryKey = 'id';
=======
    protected $table = 'contacts';
    protected $fillable = [
        'name','email','title','body'
    ];
    public $timestamp = true;
>>>>>>> e59803acfe42f79fc19d6243b2576c61c70c41ab
}
