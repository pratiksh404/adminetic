<?php

use Illuminate\Support\Facades\Route;
use Pratiksh\Adminetic\Http\Controllers\Admin\ActivityController;
use Pratiksh\Adminetic\Http\Controllers\Admin\DashboardController;
use Pratiksh\Adminetic\Http\Controllers\Admin\EditorUploadController;
use Pratiksh\Adminetic\Http\Controllers\Admin\FontAwesomeController;
use Pratiksh\Adminetic\Http\Controllers\Admin\PermissionController;
use Pratiksh\Adminetic\Http\Controllers\Admin\PreferenceController;
use Pratiksh\Adminetic\Http\Controllers\Admin\ProfileController;
use Pratiksh\Adminetic\Http\Controllers\Admin\RoleController;
use Pratiksh\Adminetic\Http\Controllers\Admin\SettingController;
use Pratiksh\Adminetic\Http\Controllers\Admin\UserController;
use Pratiksh\Adminetic\Http\Controllers\Auth\BouncerController;

Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

// Resource Controller
Route::resource('user', UserController::class);

Route::resource('profile', ProfileController::class, [
    'only' => ['show', 'edit', 'update'],
]);

Route::resource('activity', ActivityController::class, [
    'only' => ['index', 'show', 'destroy'],
]);

Route::resource('role', RoleController::class);

Route::resource('permission', PermissionController::class);

Route::resource('setting', SettingController::class);

Route::resource('preference', PreferenceController::class);

/* ================================================= */

Route::post('make_role_module_permission/{role}', [RoleController::class, 'assignModulePermission']);

Route::get('detach_role_module_permission/{role}/{permission}', [RoleController::class, 'detachModulePermssion']);

Route::patch('change_role_module_permission', [RoleController::class, 'changeModulePermission'])->name('change_role_module_permission');

/* Activitiy Routes */
Route::get('delete-all-activities', [ActivityController::class, 'delete_all_activities']);
Route::get('delete-last-month', [ActivityController::class, 'delete_last_month']);
Route::get('keep-this-month-activities', [ActivityController::class, 'keep_this_month_activities']);
Route::get('keep-latest-two-month-activities', [ActivityController::class, 'keep_latest_two_month_activities']);
Route::get('keep-latest-three-month-activities', [ActivityController::class, 'keep_latest_three_month_activities']);
/* Editor Route */
Route::post('ckeditor/upload', [EditorUploadController::class, 'upload'])->name('ckeditor.upload');
/* Setting Store */
Route::post('setting-store', [SettingController::class, 'setting_store'])->name('setting_store');
/* Bouncer Routes */
Route::get('verification_page', [BouncerController::class, 'verification_page'])->name('verification_page');
Route::post('verification', [BouncerController::class, 'verification'])->name('verification');
/* Font Awesome Routes */
Route::get('fontawesome', [FontAwesomeController::class, 'index'])->name('fontawesome');
