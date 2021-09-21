<?php

/**
 *Application Administration Base URL.
 *
 * @param  string  $route
 *@return string
 */
if (! function_exists('adminBaseUrl')) {
    function adminBaseUrl($route)
    {
        return url(config('admin.prefix', 'admin').'/'.$route);
    }
}

/**
 * Redirected Route.
 *
 *@param string $route
 *@return string
 */
if (! function_exists('adminRedirectRoute')) {
    function adminRedirectRoute($route)
    {
        return adminBaseUrl($route);
    }
}

/**
 * Create View Route.
 *
 *@param string $route
 *@return string
 */
if (! function_exists('adminCreateRoute')) {
    function adminCreateRoute($route)
    {
        return adminBaseUrl($route).'/create';
    }
}

/**
 * Shpuw View Route.
 *
 *@param string $route
 *@param int $id
 *@return return_type
 */
if (! function_exists('adminShowRoute')) {
    function adminShowRoute($route, $id)
    {
        return adminBaseUrl($route).'/'.$id;
    }
}

/**
 * Edit View Route.
 *
 *@param string $route
 *@param int $id
 *@return string
 */
if (! function_exists('adminEditRoute')) {
    function adminEditRoute($route, $id)
    {
        return adminBaseUrl($route).'/'.$id.'/edit';
    }
}

/**
 *Store Route.
 *
 *@param string $route
 *@return string
 */
if (! function_exists('adminStoreRoute')) {
    function adminStoreRoute($route)
    {
        return adminBaseUrl($route);
    }
}

/**
 *Update Route.
 *
 *@param string $route
 *@param int $id
 *@return string
 */
if (! function_exists('adminUpdateRoute')) {
    function adminUpdateRoute($route, $id)
    {
        return adminBaseUrl($route).'/'.$id;
    }
}

/**
 *Update Route.
 *
 *@param string $route
 *@param int $id
 *@return string
 */
if (! function_exists('adminDeleteRoute')) {
    function adminDeleteRoute($route, $id)
    {
        return adminBaseUrl($route).'/'.$id;
    }
}
