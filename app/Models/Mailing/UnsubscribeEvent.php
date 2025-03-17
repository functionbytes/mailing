<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnsubscribeEvent extends Model
{
    use HasFactory;

    protected $fillable = [
        'subscriber_id',
        'campaign_id',
        'unsubscribed_at',
    ];

    public function subscriber()
    {
        return $this->belongsTo(Subscriber::class);
    }

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
