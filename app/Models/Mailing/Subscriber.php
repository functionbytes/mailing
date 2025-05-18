<?php
namespace App\Models\Mailing;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'name',
        'list_id',
        'is_subscribed',
    ];

    public function list()
    {
        return $this->belongsTo(List::class);
    }
}
