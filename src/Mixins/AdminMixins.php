<?php

namespace App\Mixins;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ActivityController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\EditorUploadController;
use App\Http\Controllers\Admin\PreferenceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Auth\LoginController;

class AdminMixins
{
    public function admin()
    {
        return function () {
            Route::group(['prefix' => config('adminetic.prefix', 'admin'), 'middleware' => config('adminetic.middleware')], function () {

                $this->get('dashboard', [DashboardController::class, 'dashboard'])->name('home');

                // Resource Controller
                $this->resource('user', UserController::class);

                $this->resource('profile', ProfileController::class, [
                    'only' => ['show', 'edit', 'update']
                ]);

                $this->resource('activity', ActivityController::class, [
                    'only' => ['index', 'show', 'destroy']
                ]);

                $this->resource('role', RoleController::class);

                $this->resource('permission', PermissionController::class);

                $this->resource('setting', SettingController::class);

                $this->resource('preference', PreferenceController::class);


                /* ================================================= */

                $this->post('make_role_module_permission/{role}', [RoleController::class, 'assignModulePermission']);

                $this->get('detach_role_module_permission/{role}/{permission}', [RoleController::class, 'detachModulePermssion']);

                $this->patch('change_role_module_permission', [RoleController::class, 'changeModulePermission'])->name('change_role_module_permission');

                /* Activitiy Routes */
                $this->get('delete-all-activities', [ActivityController::class, 'delete_all_activities']);
                $this->get('delete-last-month', [ActivityController::class, 'delete_last_month']);
                $this->get('keep-this-month-activities', [ActivityController::class, 'keep_this_month_activities']);
                $this->get('keep-latest-two-month-activities', [ActivityController::class, 'keep_latest_two_month_activities']);
                $this->get('keep-latest-three-month-activities', [ActivityController::class, 'keep_latest_three_month_activities']);
                /* Editor Route */
                $this->post('ckeditor/upload', [EditorUploadController::class, 'upload'])->name('ckeditor.upload');
                /* Setting Store */
                $this->post('setting-store', [SettingController::class, 'setting_store'])->name('setting_store');
            });
        };
    }
}
