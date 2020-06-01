<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostComment extends Model
{
    public $table = 'post_comments';
    public $filable = ['author','email','url','body','post_id'];
    public $timestamp = true;
}
