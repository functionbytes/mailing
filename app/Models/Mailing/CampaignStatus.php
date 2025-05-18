<?php

namespace App\Models\Mailing;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'campaign_id',
        'status',
        'changed_at',
    ];

    public function campaign()
    {
        return $this->belongsTo(Campaign::class);
    }
}

