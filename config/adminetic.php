<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Application Information
    |--------------------------------------------------------------------------
    |
    */
    'title' => env('APP_NAME', 'Adminetic'),
    'prefix' => 'Admine',
    'suffix' => 'tic',
    'logo' => 'adminetic/static/logo.png',
    'favicon' => 'adminetic/static/favicon.png',
    'description' => 'Laravel Adminetic Admin Panel Upgrade.',
    'admin_home' => '/admin/dashboard',
    'dark_mode' => false,
    'keywords' => 'adminetic, admin panel, adminetic admin panel, doctype innovations',

    /*
    |--------------------------------------------------------------------------
    | Configurations
    |--------------------------------------------------------------------------
    |
    */
    'loader_enabled' => true,
    'double_click_protection' => true,

    /*
    |--------------------------------------------------------------------------
    | UI Configuration
    |--------------------------------------------------------------------------
    |
    */

    // Header
    'mega_menu' => false,
    'level_menu' => false,
    'language_drawer' => false,
    'search' => false,
    'notification' => false,
    'quick_menu' => false,
    'dark_light_toggle' => true,
    'fullscreen_expander' => true,
    'profile' => true,

    /*
    |--------------------------------------------------------------------------
    | Sidebar Configuration
    |--------------------------------------------------------------------------
    */
    'default_menu_icon' => 'fa fa-bars',
    'default_submenu_icon' => 'fa fa-angle-double-right',
    'default_menu_collapse' => false,

    /*
    |--------------------------------------------------------------------------
    | Card Setting
    |--------------------------------------------------------------------------
    |
    */
    'card' => '',
    'card_header' => 'b-l-primary border-3',
    'card_action_enabled' => true,
    'card_class' => '',
    'card_body' => 'shadow-lg',
    'card_footer' => '',
    'card_footer_enabled' => false,

    /*
    |--------------------------------------------------------------------------
    | Wrapper IDs and Classes
    |--------------------------------------------------------------------------
    |
    */
    'wrapper_id' => 'app',
    'wrapper_class' => 'app',

    /*
    |--------------------------------------------------------------------------
    | Notify Configuraion
    |--------------------------------------------------------------------------
    |
    */
    'notify_icon' => 'fa fa-bell-o',
    'notify_type' => 'theme',
    'notify_allow_dismiss' => true,
    'notify_delay' => 2000,
    'notify_showProgressbar' => true,
    'notify_timer' => 300,
    'notify_newest_on_top' => true,
    'notify_mouse_over' => true,
    'notify_spacing' => 1,
    'notify_animate_in' => 'animated fadeInDown',
    'notify_animate_out' => 'animated fadeOutUp',

    /*
    |--------------------------------------------------------------------------
    | Admin Dashboard Route Configurations
    |--------------------------------------------------------------------------
    |
    */
    'prefix' => 'admin',
    'middleware' => ['web', 'auth'],

    /*
    |--------------------------------------------------------------------------
    | OAuth Socialite Configuration
    |--------------------------------------------------------------------------
    |
    */
    'enable_socialite' => false,
    'github_socialite' => true,
    'facebook_socialite' => true,
    'oauth_redirect_route_name' => 'dashboard',

    /*
    |--------------------------------------------------------------------------
    | Auth Configuration
    |--------------------------------------------------------------------------
    */
    'login_view' => 'adminetic::admin.auth.login',
    'register_view' => 'adminetic::admin.auth.register',

    'default_user_role' => 'user',
    'default_user_role_level' => 1,

    /*
    |--------------------------------------------------------------------------
    | Data Settings
    |--------------------------------------------------------------------------
    |
    */
    'spa' => true,
    'caching' => true,
    'migrate_with_dummy' => false,

    // ASSETS DEPENDENCIES INJECTION
    'assets' => [],

    // Plugin Adapters
    'adapters' => [],

    // Profile Tabs
    'profile_tab' => null,

    // Bouncer
    'default_bouncer_credential' => 'adminetic',

    /*
    |--------------------------------------------------------------------------
    | Role Theme
    |--------------------------------------------------------------------------
    |
    | compact-sidebar
    | default-body
    | dark-sidebar
    | compact-wrap
    | compact-small
    | box-layout
    | enterprice-type
    | modern-layout
    | material-layout
    | material-icon
    | advance-type
    |
    */
    'role_theme' => [
        'admin' => 'compact-sidebar',
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Image Management
    |--------------------------------------------------------------------------
    */
    'default_image_placeholder' => 'adminetic/static/placeholder.png',
    'vertical_image_placeholder' => 'adminetic/static/vertical_placeholder.jpg',
    'slider_placeholder' => 'adminetic/static/slider.jpg',
    'profile_placeholder' => 'adminetic/static/profile.gif',
];
