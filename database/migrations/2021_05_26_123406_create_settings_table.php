<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Pratiksh\Adminetic\Models\Admin\Role;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('setting_name');
            $table->string('string_value')->nullable();
            $table->integer('integer_value')->nullable();
            $table->text('text_value')->nullable();
            $table->boolean('boolean_value')->nullable();
            $table->json('setting_json')->nullable();
            $table->json('setting_custom')->nullable();
            $table->integer('setting_type');
            $table->string('setting_group')->default('general');
            $table->timestamps();
        });

        // Migrate with dummy
        if (config('adminetic.migrate_with_dummy', false)) {
            Artisan::call('make:permission Role 2 --onlyFlags');
            Artisan::call('make:permission Permission 2 --onlyFlags');
            Artisan::call('make:permission User 2 --onlyFlags');

            Artisan::call('make:permission Setting 2 --onlyFlags');
            Artisan::call('make:permission Preference 2 --onlyFlags');

            $admin = User::create([
                'name' => 'Admin User',
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin123'),
            ]);

            $role = Role::where('name', 'admin')->first();

            $admin->roles()->attach($role);
            $admin->profile()->create();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
