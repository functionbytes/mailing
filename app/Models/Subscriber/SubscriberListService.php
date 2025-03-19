<?php

namespace App\Models\Subscriber;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class SubscriberListService extends Model
{

    protected $table = "subscriber_list_services";

    protected $fillable = [
        'service_id',
        'list_id',
        'created_at',
        'updated_at'
    ];

    public function scopeId($query ,$id)
    {
        return $query->where('id', $id)->first();
    }

    public function list(): BelongsTo
    {
        return $this->belongsTo('App\Models\Subscriber\SubscriberList', 'list_id');
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo('App\Models\Subscriber\SubscriberService', 'service_id');
    }


}
