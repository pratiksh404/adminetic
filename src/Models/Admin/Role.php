<?php

namespace Pratiksh\Adminetic\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Role extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $guarded = [];

    // Mutators
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtolower(str_replace(' ', '_', $value));
    }

    // Relations
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
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
        Cache::has('roles') ? Cache::forget('roles') : '';
    }

    // Logs
    protected static $logName = 'role';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    // Relations
    public function permissions()
    {
        return $this->hasMany(Permission::class);
    }
}
