<?php

namespace App\Models\Mailing;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmsTransactional extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone_number',
        'message',
        'sent_at',
    ];
}
