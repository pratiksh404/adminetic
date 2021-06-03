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
        return strtolower(str_replace([' ', '-', '$', '<', '>', '&', '{', '}', '*', '\\', '/', ':'.';', ',', "'", '"'], '_', $name ?? trim($default)));
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
        $profile = $p ?? Auth::user()->profile;

        return isset($profile->profile_pic) ? (Illuminate\Support\Str::contains($profile->profile_pic, ['https://', 'http://']) ? $profile->profile_pic : asset('storage/'.$profile->profile_pic)) : asset('adminetic/static/profile.jpg');
    }
}

if (! function_exists('getFavicon')) {
    function getFavicon()
    {
        return setting('favicon') ? (asset('storage/'.setting('favicon'))) : 'adminetic/static/favicon.png';
    }
}
if (! function_exists('getLogo')) {
    function getLogo()
    {
        return setting('logo') ? (asset('storage/'.setting('logo'))) : 'adminetic/static/logo.png';
    }
}

if (! function_exists('getLogoBanner')) {
    function getLogoBanner()
    {
        return setting('logo_banner') ? (asset('storage/'.setting('logo_banner'))) : 'adminetic/static/logo_banner.jpg';
    }
}

if (! function_exists('getLazyLoadImg')) {
    function getLazyLoadImg()
    {
        return asset('website/assets/images/image-bg.svg');
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

        return isset($setting) ? $setting->value : ($default ?? null);
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
