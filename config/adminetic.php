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
    'logo' => '',
    'favicon' => 'adminetic/static/favicon.png',
    'description' => 'Laravel Adminetic Admin Panel Upgrade.',
    'admin_home' => '/admin/dashboard',

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
    'enable_socialite' => true,
    'github_socialite' => true,
    'facebook_socialite' => true,
    'google_socialite' => false,

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
    'caching' => true,
    'migrate_with_dummy' => false,


    // ASSETS DEPENDENCIES INJECTION
    'plugins' => [
        [
            'name' => 'Datatables',
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'active' => true,
                    'location' => 'adminetic/assets/css/vendors/datatables.css'
                ],
                [
                    'type' => 'js',
                    'active' => true,
                    'location' => 'adminetic/assets/js/datatable/datatables/jquery.dataTables.min.js'
                ],
                [
                    'type' => 'js',
                    'active' => true,
                    'location' => 'adminetic/assets/js/datatable/datatable-extension/dataTables.buttons.min.js'
                ],
                [
                    'type' => 'js',
                    'active' => true,
                    'location' => 'adminetic/assets/js/datatable/datatable-extension/buttons.flash.min.js'
                ],
                [
                    'type' => 'js',
                    'active' => true,
                    'location' => 'adminetic/assets/js/datatable/datatable-extension/jszip.min.js'
                ],
                [
                    'type' => 'js',
                    'active' => true,
                    'location' => 'adminetic/assets/js/datatable/datatable-extension/pdfmake.min.js'
                ],
                [
                    'type' => 'js',
                    'active' => true,
                    'location' => 'adminetic/assets/js/datatable/datatable-extension/vfs_fonts.js'
                ],
                [
                    'type' => 'js',
                    'active' => true,
                    'location' => 'adminetic/assets/js/datatable/datatable-extension/buttons.html5.min.js'
                ],
                [
                    'type' => 'js',
                    'active' => true,
                    'location' => 'adminetic/assets/js/datatable/datatable-extension/buttons.print.min.js'
                ],
            ]
        ],
        [
            'name' => 'Icons',
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'active' => true,
                    'location' => 'adminetic/assets/css/font-awesome.css'
                ],
                [
                    'type' => 'css',
                    'active' => true,
                    'location' => 'adminetic/assets/css/vendors/icofont.css'
                ],
                [
                    'type' => 'css',
                    'active' => true,
                    'location' => 'adminetic/assets/css/vendors/themify.css'
                ],
                [
                    'type' => 'css',
                    'active' => true,
                    'location' => 'adminetic/assets/css/vendors/flag-icon.css'
                ],
                [
                    'type' => 'css',
                    'active' => true,
                    'location' => 'adminetic/assets/css/vendors/feather-icon.css'
                ],
            ]
        ],
        [
            'name' => 'Scrollbar',
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'active' => true,
                    'location' => 'adminetic/assets/css/vendors/scrollbar.css'
                ],
                [
                    'type' => 'js',
                    'active' => true,
                    'location' => 'adminetic/assets/js/scrollbar/simplebar.js'
                ],
                [
                    'type' => 'js',
                    'active' => true,
                    'location' => 'adminetic/assets/js/scrollbar/custom.js'
                ],
            ]
        ],
        [
            'name' => 'Touchspin',
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'active' => true,
                    'location' => 'adminetic/assets/js/touchspin/touchspin.js'
                ],
                [
                    'type' => 'js',
                    'active' => true,
                    'location' => 'adminetic/assets/js/touchspin/input-groups.min.js'
                ],
            ]
        ],
        [
            'name' => 'Datepicker',
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'active' => true,
                    'location' => 'adminetic/assets/css/vendors/date-picker.css'
                ],
                [
                    'type' => 'js',
                    'active' => true,
                    'location' => 'adminetic/assets/js/datepicker/date-picker/datepicker.js'
                ],
                [
                    'type' => 'js',
                    'active' => true,
                    'location' => 'adminetic/assets/js/datepicker/date-picker/datepicker.en.js'
                ],
            ]
        ],
        [
            'name' => 'CKEditor',
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'active' => true,
                    'location' => 'adminetic/assets/js/editor/ckeditor/ckeditor.js'
                ],
                [
                    'type' => 'js',
                    'active' => true,
                    'location' => 'adminetic/assets/js/editor/ckeditor/styles.js'
                ],
            ]
        ],
        [
            'name' => 'Summernote',
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'active' => true,
                    'location' => 'adminetic/assets/css/vendors/summernote.css'
                ],
                [
                    'type' => 'js',
                    'active' => true,
                    'location' => 'adminetic/assets/js/editor/summernote/summernote.js'
                ],
            ]
        ],
        [
            'name' => 'Select2',
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'active' => true,
                    'location' => 'adminetic/assets/css/vendors/select2.css'
                ],
                [
                    'type' => 'js',
                    'active' => true,
                    'location' => 'adminetic/assets/js/select2/select2.full.min.js'
                ],
            ]
        ],
        [
            'name' => 'ACE Editor',
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'active' => true,
                    'location' => 'adminetic/assets/js/editor/ace-editor/ace.js'
                ],
                [
                    'type' => 'js',
                    'active' => true,
                    'location' => 'adminetic/assets/js/editor/ace-editor/mode-html.js'
                ],
            ]
        ],
        [
            'name' => 'Notify',
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'active' => true,
                    'location' => 'adminetic/assets/js/notify/bootstrap-notify.min.js'
                ],
            ]
        ],
        [
            'name' => 'Card',
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'active' => true,
                    'location' => 'adminetic/assets/js/custom-card/custom-card.js'
                ],
            ]
        ],
    ],
];
