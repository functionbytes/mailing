<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{

    protected $table = "services";

    protected $fillable = [
        'title',
        'created_at',
        'updated_at'
    ];

    public function scopeDescending($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function scopeAscending($query)
    {
        return $query->orderBy('created_at', 'asc');
    }

    public function scopeUid($query, $uid)
    {
        return $query->where('uid', $uid)->first();
    }

    public function scopeAvailable($query)
    {
        return $query->where('available', 1);
    }

    public function lists(): BelongsToMany
    {
        return $this->belongsToMany(
            'App\Models\Subscriber\SubscriberList',
            'subscriber_list_services',
            'service_id',
            'list_id'
        );
    }

    public function subscriberlists(): BelongsToMany
    {
        return $this->belongsToMany(
            'App\Models\Subscriber\SubscriberList',
            'service_subscriber_list',  // Pivot table name
            'service_id',  // Foreign key on the pivot table for this model
            'subscriber_list_id' // Foreign key on the pivot table for the related model
        );
    }

}
