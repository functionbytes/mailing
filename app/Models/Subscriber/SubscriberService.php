<?php

namespace App\Models\Subscriber;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class  SubscriberService extends Model
{

    protected $table = "subscriber_services";

    protected $fillable = [
        'service_id',
        'subscriber_id',
        'created_at',
        'updated_at'
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($subscriberservice) {
            dispatch_sync(function () use ($subscriberservice) {
                dd($subscriberservice);
            });
        });

        static::deleted(function ($subscriberservice) {
            dispatch_sync(function () use ($subscriberservice) {
                dd($subscriberservice);
            });
        });

//
//
//        static::created(function ($subscriberservice) {
//
//            Log::info("CREATED:", ['subscriberservice' => $subscriberservice->toArray()]);
//
////            $subscriber = $subscriberservice->subscriber;
////            $serviceId = $subscriberservice->service_id;
////
////            $mailingListIds = $subscriberservice->lists()->pluck('id')->toArray();
////
////            if (!empty($mailingListIds)) {
////                AddSuscriberListJob::dispatch($subscriber->id, [$serviceId]);
////            }
//        });
//
//        static::deleting(function ($subscriberservice) {
//
//            Log::info("DELETED:", ['subscriberservice' => $subscriberservice->toArray()]);
////
////            $subscriber = $subscriberservice->subscriber;
////            $serviceId = $subscriberservice->service_id;
////
////            $mailingListIds = $subscriberservice->lists()->pluck('id')->toArray();
////
////            if (!empty($mailingListIds)) {
////                RemoveSuscriberListJob::dispatch($subscriber->id, [$serviceId]);
////            }
//        });
    }


    public function scopeId($query ,$id)
    {
        return $query->where('id', $id)->first();
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo('App\Models\service', 'service_id', 'id');
    }

    public function subscriber(): BelongsTo
    {
        return $this->belongsTo('App\Models\Subscriber\Subscriber','subscriber_id','id');
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

}
