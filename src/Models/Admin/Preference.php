<?php

namespace Pratiksh\Adminetic\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Preference extends Model
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
        Cache::has('preferences') ? Cache::forget('preferences') : '';
    }

    // Logs
    protected static $logName = 'preference';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    // Casts
    public $casts = [
        'roles' => 'array',
    ];

    // Mutators
    public function setPreferenceAttribute($value)
    {
        $this->attributes['preference'] = strtolower(str_replace(' ', '_', $value));
    }

    // Accessors
    public function getPreferenceAttribute($value)
    {
        return ucwords(str_replace('_', ' ', $value));
    }

    // Relation

    /**
     * The users that belong to the Preference.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('enabled')->withTimestamps();
    }
}
