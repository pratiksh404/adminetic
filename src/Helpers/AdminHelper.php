<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;
use Pratiksh\Adminetic\Models\Admin\Setting;

if (! function_exists('spa')) {
    function spa()
    {
        return setting('spa', config('adminetic.spa', true));
    }
}

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
        return strtolower(str_replace([' ', '-', '$', '<', '>', '&', '{', '*', '\\', '/', ':', '.', ';', ',', "'", '"'], '_', $name ?? trim($default)));
    }
}

if (! function_exists('getImagePlaceholder')) {
    function getImagePlaceholder()
    {
        return asset(config('adminetic.default_image_placeholder', 'adminetic/static/placeholder.png'));
    }
}

if (! function_exists('getVerticalImagePlaceholder')) {
    function getVerticalImagePlaceholder()
    {
        return asset(config('adminetic.vertical_image_placeholder', 'adminetic/static/vertical_placeholder.jpg'));
    }
}

if (! function_exists('getSliderPlaceholder')) {
    function getSliderPlaceholder()
    {
        return asset(config('adminetic.slider_placeholder', 'adminetic/static/slider.jpg'));
    }
}

if (! function_exists('getProfilePlaceholder')) {
    function getProfilePlaceholder($p = null)
    {
        $profile = $p ?? Auth::user()->profile ?? Auth::user()->profile()->create();

        return isset($profile->profile_pic) ? (Illuminate\Support\Str::contains($profile->profile_pic, ['https://', 'http://']) ? $profile->profile_pic : asset('storage/'.$profile->profile_pic)) : asset(config('adminetic.profile_placeholder', 'adminetic/static/profile.gif'));
    }
}

if (! function_exists('title')) {
    function title()
    {
        return setting('title', config('adminetic.name', 'Adminetic'));
    }
}

if (! function_exists('description')) {
    function description($default = null)
    {
        return setting('description', config('adminetic.description', $default ?? 'Adminetic Admin Panel'));
    }
}

if (! function_exists('keywords')) {
    function keywords()
    {
        return setting('keywords', config('adminetic.keywords', 'adminetic admin panel, adminetic, pratik shrestha, doctype innovations'));
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
        return getImg(! is_null(setting('favicon')) ? setting('favicon', config('adminetic.favicon', 'adminetic/static/favicon.png')) : config('adminetic.favicon', 'adminetic/static/favicon.png'), config('adminetic.favicon', 'adminetic/static/favicon.png'));
    }
}

if (! function_exists('logo')) {
    function logo()
    {
        return getImg(! is_null(setting('logo')) ? setting('logo', config('adminetic.logo', 'adminetic/static/logo.png')) : config('adminetic.logo', 'adminetic/static/logo.png'), config('adminetic.logo', 'adminetic/static/logo.png'));
    }
}

if (! function_exists('dark_logo')) {
    function dark_logo()
    {
        return getImg(! is_null(setting('dark_logo')) ? setting('dark_logo', config('adminetic.dark_logo', 'adminetic/static/dark_logo.png')) : config('adminetic.dark_logo', 'adminetic/static/dark_logo.png'), config('adminetic.dark_logo', 'adminetic/static/dark_logo.png'));
    }
}

if (! function_exists('logoBanner')) {
    function logoBanner()
    {
        return getImg(! is_null(setting('logo_banner')) ? setting('logo_banner', config('adminetic.logo_banner', 'adminetic/static/logo_banner.jpg')) : config('adminetic.logo_banner', 'adminetic/static/logo_banner.jpg'), config('adminetic.logo_banner', 'adminetic/static/logo_banner.jpg'));
    }
}

if (! function_exists('login_register_bg_image')) {
    function login_register_bg_image()
    {
        return getImg(! is_null(setting('login_register_bg_image')) ? setting('login_register_bg_image', config('adminetic.login_register_bg_img', 'adminetic/static/login_register_bg_img.jpg')) : config('adminetic.login_register_bg_img', 'adminetic/static/login_register_bg_img.jpg'), config('adminetic.login_register_bg_img', 'adminetic/static/login_register_bg_img.jpg'));
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
        $setting = Setting::where('setting_name', $valid_setting_name)->first();

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

if (! function_exists('api_paginate_limit')) {
    function api_paginate_limit($default = null)
    {
        return setting('api_paginate_limit', $default ?? config('adminetic.api_paginate_limit', 10));
    }
}

if (! function_exists('api_collection_return_paginate')) {
    function api_collection_return_paginate()
    {
        return setting('api_collection_return_paginate', config('adminetic.api_collection_return_paginate', true));
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

if (! function_exists('getImg')) {
    function getImg($img, $default)
    {
        if (isset($img)) {
            if (file_exists(public_path('storage/'.$img))) {
                return asset('storage/'.$img);
            } elseif (file_exists(public_path($img))) {
                return asset($img);
            } else {
                return asset($default);
            }
        } else {
            return asset($default);
        }
    }
}

if (! function_exists('putContentToClassFunction')) {
    function putContentToClassFunction($file, $function_name, $data, $closing_token = '}')
    {
        $data = $data."\n";
        // Read the contents of the file into a string
        $contents = file_get_contents($file);

        // Find the position of the function definition within the class
        $start_pos = strpos($contents, "$function_name");
        if ($start_pos === false) {
            exit('Function not found');
        }

        // Find the position of the closing brace of the function
        $end_pos = strpos($contents, $closing_token, $start_pos);
        if ($end_pos === false) {
            exit('Function not properly defined');
        }

        // Extract the function definition from the class
        $function_definition = substr($contents, $start_pos, $end_pos - $start_pos + 1);

        // Append the new content to the function definition
        $modified_function_definition = rtrim($function_definition, $closing_token).$data.$closing_token;

        // Replace the original function definition with the modified one in the class definition
        $modified_contents = substr_replace($contents, $modified_function_definition, $start_pos, $end_pos - $start_pos + 1);

        // Write the modified string back to the file
        file_put_contents($file, $modified_contents);

        return true;
    }
}

if (! function_exists('checkIfFieldIsRequired')) {
    function checkIfFieldIsRequired($table_name, $field)
    {
        $isNullable = null;
        $table = Schema::getConnection()->getDoctrineSchemaManager()->listTableDetails($table_name);

        foreach ($table->getColumns() as $column) {
            if ($column->getName() === $field) {
                $isNullable = $column->getNotnull() === false;
                break;
            }
        }

        return $isNullable;
    }
}

if (! function_exists('label')) {
    function label($table, $field, $default_label = null)
    {
        $display_name = $default_label ?? Str::ucfirst(str_replace('_', ' ', $field));
        if (! checkIfFieldIsRequired($table, $field)) {
            // do something if phone_number is nullable
            echo "{$display_name} <span class='text-danger'>*</span>";
        } else {
            echo $display_name;
        }
    }
}

if (! function_exists('role_theme')) {
    function role_theme()
    {
        $role = auth()->check() ? auth()->user()->roles->first()->name : null;
        $role_theme = config('adminetic.role_theme', null);
        if (! is_null($role_theme)) {
            return isset($role_theme[$role]) ? $role_theme[$role] : 'compact-sidebar';
        }

        return 'compact-sidebar';
    }
}

if (! function_exists('setEnvValue')) {
    function setEnvValue(array $values)
    {
        $envFile = app()->environmentFilePath();
        $str = file_get_contents($envFile);

        if (count($values) > 0) {
            foreach ($values as $envKey => $envValue) {
                $str .= "\n"; // In case the searched variable is in the last line without \n
                $keyPosition = strpos($str, "{$envKey}=");
                $endOfLinePosition = strpos($str, "\n", $keyPosition);
                $oldLine = substr($str, $keyPosition, $endOfLinePosition - $keyPosition);

                // If key does not exist, add it
                if (! $keyPosition || ! $endOfLinePosition || ! $oldLine) {
                    $str .= "{$envKey}={$envValue}\n";
                } else {
                    $str = str_replace($oldLine, "{$envKey}={$envValue}", $str);
                }
            }
        }

        $str = substr($str, 0, -1);
        if (! file_put_contents($envFile, $str)) {
            return false;
        }

        return true;
    }
}
