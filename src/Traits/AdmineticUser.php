<?php

namespace Pratiksh\Adminetic\Traits;

use Illuminate\Support\Facades\Cache;
use Pratiksh\Adminetic\Models\Admin\Profile;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * Adminetic User.
 */
trait AdmineticUser
{
    use HasPreference, HasRole, HasSlack, LogsActivity;

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
        Cache::has('users') ? Cache::forget('users') : '';
    }

    // Logs
    protected static $logName = 'user';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    // Relations

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
}
