<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'subject',
        'html_content',
        'text_content',
        'list_id',
        'status',
    ];

    public function list()
    {
        return $this->belongsTo(List::class);
    }

    public function status()
    {
        return $this->hasMany(CampaignStatus::class);
    }

    public function responseLogs()
    {
        return $this->hasMany(ResponseLog::class);
    }
}
