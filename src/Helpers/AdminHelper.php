<?php

if (! function_exists('getClassesList')) {
    function getClassesList($dir)
    {
        $classes = \File::allFiles($dir);
        foreach ($classes as $class) {
            $class->classname = str_replace(
                [app_path(), '/', '.php'],
                ['App', '\\', ''],
                $class->getRealPath()
            );
        }

        return $classes;
    }
}
if (! function_exists('getAllModelNames')) {
    function getAllModelNames($dir)
    {
        $modelNames = [];
        $models = getClassesList($dir);
        foreach ($models as $model) {
            $model_name = explode('\\', $model->classname);
            $modelNames[] = end($model_name);
        }

        return $modelNames;
    }
}

if (! function_exists('validImageFolder')) {
    function validImageFolder($name, $default = 'default')
    {
        return strtolower(str_replace([' ', '-', '$', '<', '>', '&', '{', '}', '*', '\\', '/', ':', '.', ';', ',', "'", '"'], '_', $name ?? trim($default)));
    }
}

if (! function_exists('getImagePlaceholder')) {
    function getImagePlaceholder()
    {
        return asset('adminetic/static/placeholder.png');
    }
}

if (! function_exists('getVerticalImagePlaceholder')) {
    function getVerticalImagePlaceholder()
    {
        return asset('adminetic/static/vertical_placeholder.jpg');
    }
}

if (! function_exists('getSliderPlaceholder')) {
    function getSliderPlaceholder()
    {
        return asset('adminetic/static/slider.jpg');
    }
}

if (! function_exists('getFoodImagePlaceholder')) {
    function getFoodImagePlaceholder()
    {
        return asset('adminetic/static/food_placeholder.jpg');
    }
}

if (! function_exists('getProfilePlaceholder')) {
    function getProfilePlaceholder($p = null)
    {
        $profile = $p ?? Auth::user()->profile ?? Auth::user()->profile()->create();

        return isset($profile->profile_pic) ? (Illuminate\Support\Str::contains($profile->profile_pic, ['https://', 'http://']) ? $profile->profile_pic : asset('storage/'.$profile->profile_pic)) : asset('adminetic/static/profile.jpg');
    }
}

if (! function_exists('title')) {
    function title()
    {
        return setting('title', config('adminetic.name', 'Adminetic'));
    }
}

if (! function_exists('loader_enabled')) {
    function loader_enabled()
    {
        return setting('loader_enabled', config('adminetic.loader_enabled', true));
    }
}

if (! function_exists('favicon')) {
    function favicon()
    {
        return setting('favicon') ? (asset('storage/'.setting('favicon'))) : asset('adminetic/static/favicon.png');
    }
}

if (! function_exists('logo')) {
    function logo()
    {
        return setting('logo') ? (asset('storage/'.setting('logo'))) : asset('adminetic/static/logo.png');
    }
}

if (! function_exists('dark_logo')) {
    function dark_logo()
    {
        return setting('dark_logo') ? (asset('storage/'.setting('dark_logo'))) : asset('adminetic/static/logo_dark.png');
    }
}

if (! function_exists('getLogoBanner')) {
    function getLogoBanner()
    {
        return setting('logo_banner') ? (asset('storage/'.setting('logo_banner'))) : asset('adminetic/static/logo_banner.jpg');
    }
}

if (! function_exists('login_register_bg_image')) {
    function login_register_bg_image()
    {
        return setting('login_register_bg_image') ? (asset('storage/'.setting('login_register_bg_image'))) : asset('adminetic/static/login_register_bg_img.jpg');
    }
}

if (! function_exists('getLazyLoadImg')) {
    function getLazyLoadImg()
    {
        return asset('adminetic/static/loader.svg');
    }
}

if (! function_exists('random_color_part')) {
    function random_color_part()
    {
        return str_pad(dechex(mt_rand(0, 255)), 2, '0', STR_PAD_LEFT);
    }
}

if (! function_exists('random_color')) {
    function random_color()
    {
        return random_color_part().random_color_part().random_color_part();
    }
}

if (! function_exists('setting')) {
    function setting($setting_name, $default = null)
    {
        $valid_setting_name = strtolower(str_replace(' ', '_', $setting_name));
        $setting = \Pratiksh\Adminetic\Models\Admin\Setting::where('setting_name', $valid_setting_name)->first();

        return isset($setting->value) ? $setting->value : ($default ?? null);
    }
}

if (! function_exists('preference')) {
    function preference($preference_name, bool $default = null)
    {
        $valid_preference_name = strtolower(str_replace(' ', '_', $preference_name));
        if (auth()->check()) {
            $preference = auth()->user()->preferences()->where('preference', $valid_preference_name)->first();

            return isset($preference) ? $preference->pivot->enabled : ($default ?? null);
        } else {
            return null;
        }
    }
}

if (! function_exists('deleteImage')) {
    function deleteImage($image)
    {
        $image ? (\Illuminate\Support\Facades\File::exists(public_path('storage/'.$image)) ? \Illuminate\Support\Facades\File::delete(public_path('storage/'.$image)) : '') : '';
    }
}

if (! function_exists('darkMode')) {
    function darkMode()
    {
        return setting('dark_mode', config('adminetic.dark_mode', false));
    }
}

if (! function_exists('getCondition')) {
    function getCondition($conditions)
    {
        $result = null;
        if (! isset($conditions)) {
            return false;
        }

        if (count($conditions) > 0) {
            if (count($conditions) == 1) {
                return $conditions[0]['condition'];
            } else {
                foreach ($conditions as $condition) {
                    if (isset($condition['type']) && isset($condition['condition'])) {
                        if ($condition['type'] == 'or' || $condition['type'] == 'Or' || $condition['type'] == 'OR' || $condition['type'] == '||') {
                            $result = $result || $condition['condition'];
                        } elseif ($condition['type'] == 'and' || $condition['type'] == 'And' || $condition['type'] == 'AND' || $condition['type'] == '&&') {
                            $result = $result && $condition['condition'];
                        }
                    }
                }
            }

            return $result;
        } else {
            return false;
        }
    }
}
