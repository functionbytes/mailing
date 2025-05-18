<?php

namespace App\Models\Mailing;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MediaFile extends Model
{
    use HasFactory;

    protected $fillable = [
        'filename',
        'file_url',
        'folder_id',
    ];

    public function folder()
    {
        return $this->belongsTo(MediaFolder::class);
    }
}
