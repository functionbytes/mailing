<?php

namespace App\Models\Mailing;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BulkEmailSending extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'bulk_email_id',
    ];

    public function bulkEmail()
    {
        return $this->belongsTo(BulkEmail::class);
    }
}
