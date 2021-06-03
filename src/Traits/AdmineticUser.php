<?php

namespace Pratiksh\Adminetic\Traits;

use Illuminate\Support\Facades\Cache;
use Pratiksh\Adminetic\Models\Admin\Profile;

/**
 * Adminetic User.
 */
trait AdmineticUser
{
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

    // Relations

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
}
