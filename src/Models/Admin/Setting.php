<?php

namespace Pratiksh\Adminetic\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Setting extends Model
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
        Cache::has('settings') ? Cache::forget('settings') : '';
    }

    // Logs
    protected static $logName = 'setting';

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults();
    }

    // Casts
    public $casts = [
        'setting_custom' => 'array',
        'setting_json' => 'array',
    ];

    // Appends
    public $appends = ['custom', 'value'];

    // Mutators
    public function setSettingNameAttribute($value)
    {
        $this->attributes['setting_name'] = strtolower(str_replace(' ', '_', $value));
    }

    public function setSettingGroupAttribute($value)
    {
        $this->attributes['setting_group'] = strtolower(str_replace(' ', '_', $value));
    }

    // Accessors
    public function getSettingNameAttribute($value)
    {
        return ucwords(str_replace('_', ' ', $value));
    }

    public function getSettingGroupAttribute($value)
    {
        return ucwords(str_replace('_', ' ', $value));
    }

    public function getSettingTypeAttribute($attribute)
    {
        return [
            1 => 'string',
            2 => 'integer',
            3 => 'text',
            4 => 'rich text',
            5 => 'switch',
            6 => 'checkbox',
            7 => 'select',
            8 => 'multiple',
            9 => 'tag',
            10 => 'image',
            11 => 'custom',
        ][$attribute];
    }

    public function getCustomAttribute()
    {
        return isset($this->setting_custom) ? json_decode($this->setting_custom) : null;
    }

    public function getValueAttribute()
    {
        if ($this->getRawOriginal('setting_type') == 1 || $this->getRawOriginal('setting_type') == 10) {
            return $this->string_value;
        } elseif ($this->getRawOriginal('setting_type') == 2 || $this->getRawOriginal('setting_type') == 6 || $this->getRawOriginal('setting_type') == 7) {
            return $this->integer_value;
        } elseif ($this->getRawOriginal('setting_type') == 3 || $this->getRawOriginal('setting_type') == 4) {
            return $this->text_value;
        } elseif ($this->getRawOriginal('setting_type') == 5) {
            return $this->boolean_value;
        } elseif ($this->getRawOriginal('setting_type') == 8 || $this->getRawOriginal('setting_type') == 9) {
            return $this->setting_json;
        } else {
            return null;
        }
    }
}
