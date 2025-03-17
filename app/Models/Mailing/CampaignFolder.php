<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CampaignFolder extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function campaigns()
    {
        return $this->hasMany(Campaign::class);
    }
}
