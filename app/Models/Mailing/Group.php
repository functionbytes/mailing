<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'list_id',
    ];

    public function list()
    {
        return $this->belongsTo(List::class);
    }

    public function subscribers()
    {
        return $this->hasMany(Subscriber::class);
    }
}
