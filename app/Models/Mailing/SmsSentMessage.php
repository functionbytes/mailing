<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmsSentMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone_number',
        'message',
        'status',
        'sent_at',
    ];
}
