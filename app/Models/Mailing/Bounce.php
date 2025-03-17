<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bounce extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'campaign_id',
        'reason',
        'bounced_at',
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}
