<?php

namespace Pratiksh\Adminetic\Services;

use Exception;
use Illuminate\Support\Str;
use Pratiksh\Adminetic\Traits\SidebarHelper;

class Adminetic
{
    use SidebarHelper;

    public function user()
    {
        $user = config('auth.providers.users.model');

        return new $user;
    }

    public function assets(): array
    {
        $client_assets = $this->getClientAssets();
        $default_assets = $this->getDefaultAssets();
        $getPluginAssets = $this->getPluginAssets();
        $allAssets = array_merge($default_assets, $client_assets, $getPluginAssets);

        $assets = array_unique($allAssets, SORT_REGULAR);

        return $assets;
    }

    public function menus(): array
    {
        $client_menus = $this->clientMenus();
        $adminetic_menus = $this->admineticMenus();
        $plugin_menus = $this->pluginMenus();
        $allmenus = array_merge($adminetic_menus, $client_menus, $plugin_menus);

        return $allmenus;
    }

    public function getClientAssets(): array
    {
        return config('adminetic.assets', []);
    }

    public function getDefaultAssets(): array
    {
        return [
            [
                'name' => 'Datatables',
                'active' => true,
                'files' => [
                    [
                        'type' => 'css',
                        'active' => true,
                        'location' => 'adminetic/assets/css/vendors/datatables.css',
                    ],
                    [
                        'type' => 'css',
                        'active' => true,
                        'location' => 'adminetic/assets/css/vendors/rowReorder.dataTables.min.css',
                    ],
                    [
                        'type' => 'js',
                        'active' => true,
                        'location' => 'adminetic/assets/js/datatable/datatables/jquery.dataTables.min.js',
                    ],
                    [
                        'type' => 'js',
                        'active' => true,
                        'location' => 'adminetic/assets/js/datatable/datatable-extension/dataTables.buttons.min.js',
                    ],
                    [
                        'type' => 'js',
                        'active' => true,
                        'location' => 'adminetic/assets/js/datatable/datatable-extension/buttons.flash.min.js',
                    ],
                    [
                        'type' => 'js',
                        'active' => true,
                        'location' => 'adminetic/assets/js/datatable/datatable-extension/jszip.min.js',
                    ],
                    [
                        'type' => 'js',
                        'active' => true,
                        'location' => 'adminetic/assets/js/datatable/datatable-extension/pdfmake.min.js',
                    ],
                    [
                        'type' => 'js',
                        'active' => true,
                        'location' => 'adminetic/assets/js/datatable/datatable-extension/vfs_fonts.js',
                    ],
                    [
                        'type' => 'js',
                        'active' => true,
                        'location' => 'adminetic/assets/js/datatable/datatable-extension/buttons.html5.min.js',
                    ],
                    [
                        'type' => 'js',
                        'active' => true,
                        'location' => 'adminetic/assets/js/datatable/datatable-extension/buttons.print.min.js',
                    ],
                    [
                        'type' => 'js',
                        'active' => true,
                        'location' => 'adminetic/assets/js/datatable/datatable-extension/dataTables.rowReorder.min.js',
                    ],
                ],
            ],
            [
                'name' => 'Icons',
                'active' => true,
                'files' => [
                    [
                        'type' => 'css',
                        'active' => true,
                        'location' => 'adminetic/assets/css/fontawesome-all.min.css',
                    ],
                    [
                        'type' => 'css',
                        'active' => true,
                        'location' => 'adminetic/assets/css/vendors/icofont.css',
                    ],
                    [
                        'type' => 'css',
                        'active' => true,
                        'location' => 'adminetic/assets/css/vendors/themify.css',
                    ],
                    [
                        'type' => 'css',
                        'active' => true,
                        'location' => 'adminetic/assets/css/vendors/flag-icon.css',
                    ],
                    [
                        'type' => 'css',
                        'active' => true,
                        'location' => 'adminetic/assets/css/vendors/feather-icon.css',
                    ],
                ],
            ],
            [
                'name' => 'Scrollbar',
                'active' => true,
                'files' => [
                    [
                        'type' => 'css',
                        'active' => true,
                        'location' => 'adminetic/assets/css/vendors/scrollbar.css',
                    ],
                    [
                        'type' => 'js',
                        'active' => true,
                        'location' => 'adminetic/assets/js/scrollbar/simplebar.js',
                    ],
                    [
                        'type' => 'js',
                        'active' => true,
                        'location' => 'adminetic/assets/js/scrollbar/custom.js',
                    ],
                ],
            ],
            [
                'name' => 'Touchspin',
                'active' => true,
                'files' => [
                    [
                        'type' => 'js',
                        'active' => true,
                        'location' => 'adminetic/assets/js/touchspin/touchspin.js',
                    ],
                    [
                        'type' => 'js',
                        'active' => true,
                        'location' => 'adminetic/assets/js/touchspin/input-groups.min.js',
                    ],
                ],
            ],
            [
                'name' => 'Animate',
                'active' => true,
                'files' => [
                    [
                        'type' => 'css',
                        'active' => true,
                        'location' => 'adminetic/assets/css/vendors/animate.css',
                    ],
                ],
            ],
            [
                'name' => 'Print This',
                'active' => true,
                'files' => [
                    [
                        'type' => 'js',
                        'active' => true,
                        'location' => 'adminetic/assets/js/printThis.js',
                    ],
                ],
            ],
            [
                'name' => 'Daterange Picker',
                'active' => true,
                'files' => [
                    [
                        'type' => 'css',
                        'active' => true,
                        'location' => 'adminetic/assets/css/vendors/daterange-picker.css',
                    ],
                    [
                        'type' => 'js',
                        'active' => true,
                        'location' => 'adminetic/assets/js/datepicker/daterange-picker/moment.min.js',
                    ],
                    [
                        'type' => 'js',
                        'active' => true,
                        'location' => 'adminetic/assets/js/datepicker/daterange-picker/daterangepicker.js',
                    ],
                ],
            ],
            [
                'name' => 'CKEditor',
                'active' => true,
                'files' => [
                    [
                        'type' => 'js',
                        'active' => true,
                        'location' => 'adminetic/assets/js/editor/ckeditor/ckeditor.js',
                    ],
                    [
                        'type' => 'js',
                        'active' => true,
                        'location' => 'adminetic/assets/js/editor/ckeditor/styles.js',
                    ],
                ],
            ],
            [
                'name' => 'Summernote',
                'active' => true,
                'files' => [
                    [
                        'type' => 'css',
                        'active' => true,
                        'location' => 'adminetic/assets/css/vendors/summernote.css',
                    ],
                    [
                        'type' => 'js',
                        'active' => true,
                        'location' => 'adminetic/assets/js/editor/summernote/summernote.js',
                    ],
                ],
            ],
            [
                'name' => 'Select2',
                'active' => true,
                'files' => [
                    [
                        'type' => 'css',
                        'active' => true,
                        'location' => 'adminetic/assets/css/vendors/select2.css',
                    ],
                    [
                        'type' => 'js',
                        'active' => true,
                        'location' => 'adminetic/assets/js/select2/select2.full.min.js',
                    ],
                ],
            ],
            [
                'name' => 'ACE Editor',
                'active' => false,
                'files' => [
                    [
                        'type' => 'js',
                        'active' => true,
                        'location' => 'adminetic/assets/js/editor/ace-editor/ace.js',
                    ],
                    [
                        'type' => 'js',
                        'active' => true,
                        'location' => 'adminetic/assets/js/editor/ace-editor/mode-html.js',
                    ],
                ],
            ],
            [
                'name' => 'Notify',
                'active' => true,
                'files' => [
                    [
                        'type' => 'js',
                        'active' => true,
                        'location' => 'adminetic/assets/js/notify/bootstrap-notify.min.js',
                    ],
                ],
            ],
            [
                'name' => 'Card',
                'active' => true,
                'files' => [
                    [
                        'type' => 'js',
                        'active' => true,
                        'location' => 'adminetic/assets/js/custom-card/custom-card.js',
                    ],
                ],
            ],
        ];
    }

    public function getPluginAssets(): array
    {
        $pluginAssets = [];
        if (count($this->getAdapters()) > 0) {
            foreach ($this->getAdapters() as $adapter) {
                $pluginAssets = array_merge($pluginAssets, $adapter->assets());
            }
        }

        return $pluginAssets;
    }

    public function admineticMenus(): array
    {
        return [];
    }

    public function clientMenus(): array
    {
        $myMenu = config('adminetic.myMenu', \App\Services\MyMenu::class);
        if (class_exists($myMenu)) {
            if (method_exists($myMenu, 'myMenu')) {
                $menu = new $myMenu;
                if (is_array($menu->myMenu())) {
                    return $menu->myMenu();
                } else {
                    throw new Exception('myMenu method return type must be an array.');
                }
            } else {
                throw new Exception('myMenu method is not found', 1);
            }
        } else {
            throw new Exception('Given class namespace is not found');
        }
    }

    public function pluginMenus(): array
    {
        $pluginMenu = [];
        if (count($this->getAdapters()) > 0) {
            foreach ($this->getAdapters() as $adapter) {
                $pluginMenu = array_merge($pluginMenu, $adapter->myMenu());
            }
        }

        return $pluginMenu;
    }

    public function getHeaderData(): array
    {
        $headerData = [];
        if (count($this->getAdapters()) > 0) {
            foreach ($this->getAdapters() as $adapter) {
                if (method_exists($adapter, 'headerData')) {
                    $headerData = array_merge($headerData, $adapter->headerData());
                }
            }
        }

        return $headerData;
    }

    public function getFooterData(): array
    {
        $footerData = [];
        if (count($this->getAdapters()) > 0) {
            foreach ($this->getAdapters() as $adapter) {
                if (method_exists($adapter, 'footerData')) {
                    $footerData = array_merge($footerData, $adapter->footerData());
                }
            }
        }

        return $footerData;
    }

    public function getAdapters(): array
    {
        $adapters = [];
        foreach (config('adminetic.adapters', []) as $adapter) {
            if (class_exists($adapter)) {
                $init_adapter = new $adapter;
                $adapters[] = $init_adapter;
            }
        }

        return $adapters;
    }

    private function indexCreateChildren($route, $class)
    {
        $name = Str::ucfirst($route);
        $plural = Str::ucfirst(Str::plural($name));

        $children = [
            [
                'type' => 'submenu',
                'name' => 'All '.$plural,
                'is_active' => request()->routeIs($route.'.index') ? 'active' : '',
                'link' => adminRedirectRoute($route),
                'conditions' => [
                    [
                        'type' => 'or',
                        'condition' => auth()->user()->can('view-any', $class),
                    ],
                ],
            ],
            [
                'type' => 'submenu',
                'name' => 'Create '.$route,
                'is_active' => request()->routeIs($route.'.create') ? 'active' : '',
                'link' => adminCreateRoute($route),
                'conditions' => [
                    [
                        'type' => 'or',
                        'condition' => auth()->user()->can('create', $class),
                    ],
                ],
            ],
        ];

        return $children;
    }
}
