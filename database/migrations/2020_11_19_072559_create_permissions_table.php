<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;
use Pratiksh\Adminetic\Models\Admin\Role;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->id();
            $table->boolean('browse')->default(1);
            $table->boolean('read')->default(1);
            $table->boolean('edit')->default(1);
            $table->boolean('add')->default(1);
            $table->boolean('delete')->default(1);
            $table->string('name')->nullable();
            $table->boolean('can')->nullable();
            $table->foreignId('role_id')->constrained()->cascadeOnDelete();
            $table->string('model')->default('all');
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
        Schema::dropIfExists('permissions');
    }
}
