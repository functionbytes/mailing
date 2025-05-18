<?php

namespace App\Models\Mailing;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiBatch extends Model
{
    use HasFactory;

    protected $fillable = [
        'batch_data',
        'executed_at',
    ];
}
