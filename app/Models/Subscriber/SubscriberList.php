<?php

namespace App\Models\Subscriber;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use App\Library\Traits\HasUid;

class SubscriberList extends Model
{
    use HasUid;

    protected $table = "subscriber_lists";

    protected $fillable = [
        'uid',
        'title',
        'code',
        'available',
        'default',
        'lang_id',
        'created_at',
        'updated_at'
    ];

    public function scopeAvailable($query)
    {
        return $query->where('available', 1);
    }

    public function scopeDefault($query)
    {
        return $query->where('default', 1);
    }

    public function scopeLang($query,$lang)
    {
        return $query->where('lang_id', $lang);
    }

    public function scopeId($query ,$id)
    {
        return $query->where('id', $id)->first();
    }

    public function scopeCode($query ,$code)
    {
        return $query->where('code', $code)->first();
    }

    public function scopeUid($query ,$uid)
    {
        return $query->where('uid', $uid)->first();
    }

    public function lang(): BelongsTo
    {
        return $this->belongsTo('App\Models\Lang','lang_id','id');
    }

    public static function getBlacklistByLang($langId)
    {
        return self::where('code', 'BLACKLIST')->where('lang_id', $langId)->first();
    }


    public function lists(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Subscriber\SubscriberList','subscriber_list_categories','categorie_id','list_id');
    }

    public function subscriber(): BelongsTo
    {
        return $this->belongsTo('App\Models\Subscriber\Subscriber', 'subscriber_id', 'id');
    }

    public function categorie(): HasMany
    {
        return $this->hasMany('App\Models\Subscriber\SubscriberListService','list_id','id');
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(
            SubscriberService::class,
            'subscriber_list_categories',
            'list_id',
            'categorie_id'
        );
    }

    public function listcategories(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Service', 'subscriber_list_categories', 'list_id', 'categorie_id');
    }

    public function subscribers(): BelongsToMany
    {
        return $this->belongsToMany(
            Subscriber::class,
            'subscriber_list_users',
            'list_id',
            'subscriber_id'
        );
    }

}

