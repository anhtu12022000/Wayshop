<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $table = 'posts';
    public $filable = ['title','slug','decription','images','body'];
    public $timestamp = true;
}
