<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $table = 'chats';
    protected $primaryKey = 'id';

    protected $fillable = [
        'sender_id', 'receiver_id', 'message', 'send_from'
    ];
}
