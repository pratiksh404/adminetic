<?php

namespace Pratiksh\Adminetic\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Data extends Model
{
    use LogsActivity;

    protected $guarded = [];

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
        Cache::has('data') ? Cache::forget('data') : '';
    }

    // Logs
    protected static $logName = 'data';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    // Cast
    protected $casts = [
        'content' => 'array',
    ];
}
