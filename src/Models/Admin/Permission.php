<?php

namespace Pratiksh\Adminetic\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Permission extends Model
{
    use LogsActivity;

    protected $guarded = [];

    // Mutators
    public function setCanAttribute($value)
    {
        return $this->attributes['can'] = strtolower(str_replace(' ', '-', $value));
    }

    // Forget cache on updating or saving and deleting
    public static function boot()
    {
        parent::boot();

        static::saving(function () {
            self::cacheKey();
        });

        static::deleting(function () {
            self::cacheKey();
        });
    }

    // Cache Keys
    private static function cacheKey()
    {
        Cache::has('permissions') ? Cache::forget('permissions') : '';
    }

    // Logs
    protected static $logName = 'permission';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    // Relations
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
