<?php

namespace Pratiksh\Adminetic\Repositories;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;
use Pratiksh\Adminetic\Contracts\SettingRepositoryInterface;
use Pratiksh\Adminetic\Http\Requests\SettingRequest;
use Pratiksh\Adminetic\Models\Admin\Setting;

class SettingRepository implements SettingRepositoryInterface
{
    // Setting Index
    public function indexSetting()
    {
        $settings = config('adminetic.caching', true)
            ? (Cache::has('settings') ? Cache::get('settings') : Cache::rememberForever('settings', function () {
                return Setting::latest()->get();
            }))
            : Setting::latest()->get();

        $setting_grouped = Setting::where('setting_type', '<>', 11)->get()->groupBy('setting_group');

        return compact('settings', 'setting_grouped');
    }

    // Setting Create
    public function createSetting()
    {
        $setting_groups = Setting::all()->pluck('setting_group')->toArray();

        return compact('setting_groups');
    }

    // Setting Store
    public function storeSetting(SettingRequest $request)
    {
        Setting::create($request->validated());
    }

    // Setting Show
    public function showSetting(Setting $setting)
    {
        return compact('setting');
    }

    // Setting Edit
    public function editSetting(Setting $setting)
    {
        $setting_groups = Setting::all()->pluck('setting_group')->toArray();

        return compact('setting', 'setting_groups');
    }

    // Setting Update
    public function updateSetting(SettingRequest $request, Setting $setting)
    {
        $setting->update($request->validated());
    }

    // Setting Destroy
    public function destroySetting(Setting $setting)
    {
        $setting->delete();
    }

    // Mass Setting Store
    public function setting_store(Request $request)
    {
        foreach ($request->all() as $key => $value) {
            $setting = Setting::where('setting_name', $key)->first();
            if (isset($setting)) {
                if ($key != '_token') {
                    $request->validate([
                        $key => $this->getValidationRule($setting),
                    ]);

                    $this->store_setting_value($setting, $key, $value);
                }
            }
        }
    }

    private function getValidationRule(Setting $setting)
    {
        if ($setting->getRawOriginal('setting_type') == 1) {
            return 'max:255';
        } elseif ($setting->getRawOriginal('setting_type') == 2) {
            return 'numeric';
        } elseif ($setting->getRawOriginal('setting_type') == 3) {
            return 'max:3000';
        } elseif ($setting->getRawOriginal('setting_type') == 4) {
            return 'max:65000';
        } elseif ($setting->getRawOriginal('setting_type') == 5) {
            return 'boolean';
        } elseif ($setting->getRawOriginal('setting_type') == 6) {
            return 'numeric';
        } elseif ($setting->getRawOriginal('setting_type') == 7) {
            return 'sometimes';
        } elseif ($setting->getRawOriginal('setting_type') == 8) {
            return 'sometimes';
        } elseif ($setting->getRawOriginal('setting_type') == 9) {
            return 'sometimes';
        } elseif ($setting->getRawOriginal('setting_type') == 10) {
            return 'image|file|max:3000';
        }
    }

    private function store_setting_value(Setting $setting, $key, $value)
    {
        if ($setting->getRawOriginal('setting_type') == 1 || $setting->getRawOriginal('setting_type') == 10) {
            $setting->update([
                'string_value' => $value,
            ]);
            if ($setting->getRawOriginal('setting_type') == 10) {
                if (request()->has($key)) {
                    $setting->update([
                        'string_value' => $value->store('admin/setting', 'public'),
                    ]);
                    $image = Image::make($value->getRealPath());
                    $image->save(public_path('storage/'.$setting->string_value));
                }
            }
        } elseif ($setting->getRawOriginal('setting_type') == 2 || $setting->getRawOriginal('setting_type') == 6 || $setting->getRawOriginal('setting_type') == 7) {
            $setting->update([
                'integer_value' => $value,
            ]);
        } elseif ($setting->getRawOriginal('setting_type') == 3 || $setting->getRawOriginal('setting_type') == 4) {
            $setting->update([
                'text_value' => $value,
            ]);
        } elseif ($setting->getRawOriginal('setting_type') == 5) {
            $setting->update([
                'boolean_value' => $value,
            ]);
        } elseif ($setting->getRawOriginal('setting_type') == 8 || $setting->getRawOriginal('setting_type') == 9) {
            $setting->update([
                'setting_json' => $value,
            ]);
        } else {
            $setting->update([
                'string_value' => $value,
            ]);
        }
    }
}
