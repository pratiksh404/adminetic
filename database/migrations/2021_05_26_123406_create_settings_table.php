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

        $this->populateDummyData();
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

    private function populateDummyData()
    {
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
        \DB::table('settings')->insert([
            0 => [
                'id' => 5,
                'setting_name' => 'logo',
                'string_value' => null,
                'integer_value' => null,
                'text_value' => null,
                'boolean_value' => null,
                'setting_json' => null,
                'setting_custom' => '"{\\r\\n    \\"class\\": \\"logo\\",\\r\\n    \\"id\\": \\"logo\\"\\r\\n}"',
                'setting_type' => 10,
                'setting_group' => 'multimedia',
                'created_at' => '2023-03-23 08:19:08',
                'updated_at' => '2023-03-23 08:19:08',
            ],
            1 => [
                'id' => 6,
                'setting_name' => 'favicon',
                'string_value' => null,
                'integer_value' => null,
                'text_value' => null,
                'boolean_value' => null,
                'setting_json' => null,
                'setting_custom' => '"{\\r\\n    \\"class\\": \\"favicon\\",\\r\\n    \\"id\\": \\"favicon\\"\\r\\n}"',
                'setting_type' => 10,
                'setting_group' => 'multimedia',
                'created_at' => '2023-03-23 08:19:26',
                'updated_at' => '2023-03-23 08:19:26',
            ],
            2 => [
                'id' => 7,
                'setting_name' => 'dark_logo',
                'string_value' => null,
                'integer_value' => null,
                'text_value' => null,
                'boolean_value' => null,
                'setting_json' => null,
                'setting_custom' => '"{\\r\\n    \\"class\\": \\"dark_logo\\",\\r\\n    \\"id\\": \\"dark_logo\\"\\r\\n}"',
                'setting_type' => 10,
                'setting_group' => 'multimedia',
                'created_at' => '2023-03-23 08:19:45',
                'updated_at' => '2023-03-23 08:19:45',
            ],
            3 => [
                'id' => 8,
                'setting_name' => 'logobanner',
                'string_value' => null,
                'integer_value' => null,
                'text_value' => null,
                'boolean_value' => null,
                'setting_json' => null,
                'setting_custom' => '"{\\r\\n    \\"class\\": \\"logoBanner\\",\\r\\n    \\"id\\": \\"logoBanner\\"\\r\\n}"',
                'setting_type' => 10,
                'setting_group' => 'multimedia',
                'created_at' => '2023-03-23 08:20:00',
                'updated_at' => '2023-03-23 08:20:00',
            ],
            4 => [
                'id' => 9,
                'setting_name' => 'login_register_bg_image',
                'string_value' => null,
                'integer_value' => null,
                'text_value' => null,
                'boolean_value' => null,
                'setting_json' => null,
                'setting_custom' => '"{\\r\\n    \\"class\\": \\"login_register_bg_image\\",\\r\\n    \\"id\\": \\"login_register_bg_image\\"\\r\\n}"',
                'setting_type' => 10,
                'setting_group' => 'multimedia',
                'created_at' => '2023-03-23 08:20:15',
                'updated_at' => '2023-03-23 08:20:15',
            ],
            5 => [
                'id' => 10,
                'setting_name' => 'title',
                'string_value' => null,
                'integer_value' => null,
                'text_value' => null,
                'boolean_value' => null,
                'setting_json' => null,
                'setting_custom' => '"{\\r\\n    \\"class\\": \\"title\\",\\r\\n    \\"id\\": \\"title\\",\\r\\n    \\"placeholder\\": \\"Site Title Here!!\\"\\r\\n}"',
                'setting_type' => 1,
                'setting_group' => 'general',
                'created_at' => '2023-03-23 08:20:41',
                'updated_at' => '2023-03-23 08:20:41',
            ],
            6 => [
                'id' => 11,
                'setting_name' => 'description',
                'string_value' => null,
                'integer_value' => null,
                'text_value' => null,
                'boolean_value' => null,
                'setting_json' => null,
                'setting_custom' => '"{\\r\\n    \\"class\\": \\"description\\",\\r\\n    \\"id\\": \\"description\\"\\r\\n}"',
                'setting_type' => 3,
                'setting_group' => 'general',
                'created_at' => '2023-03-23 08:23:45',
                'updated_at' => '2023-03-23 08:23:45',
            ],
            7 => [
                'id' => 12,
                'setting_name' => 'phone',
                'string_value' => null,
                'integer_value' => null,
                'text_value' => null,
                'boolean_value' => null,
                'setting_json' => null,
                'setting_custom' => '"{\\r\\n    \\"class\\": \\"phone\\",\\r\\n    \\"id\\": \\"phone\\",\\r\\n    \\"placeholder\\": \\"Phone Number\\",\\r\\n    \\"max\\": 9899999999,\\r\\n    \\"min\\": 9000000000\\r\\n}"',
                'setting_type' => 1,
                'setting_group' => 'general',
                'created_at' => '2023-03-23 08:24:52',
                'updated_at' => '2023-03-23 08:24:52',
            ],
            8 => [
                'id' => 13,
                'setting_name' => 'email',
                'string_value' => null,
                'integer_value' => null,
                'text_value' => null,
                'boolean_value' => null,
                'setting_json' => null,
                'setting_custom' => '"{\\r\\n    \\"class\\": \\"email\\",\\r\\n    \\"id\\": \\"email\\",\\r\\n    \\"placeholder\\": \\"Email Address\\"\\r\\n}"',
                'setting_type' => 1,
                'setting_group' => 'general',
                'created_at' => '2023-03-23 08:25:21',
                'updated_at' => '2023-03-23 08:25:21',
            ],
            9 => [
                'id' => 14,
                'setting_name' => 'currency',
                'string_value' => null,
                'integer_value' => null,
                'text_value' => null,
                'boolean_value' => null,
                'setting_json' => null,
                'setting_custom' => '"{\\r\\n    \\"class\\": \\"currency\\",\\r\\n    \\"id\\": \\"currency\\",\\r\\n    \\"value\\": \\"Rs.\\",\\r\\n    \\"placeholder\\": \\"Currency Symbol\\"\\r\\n}"',
                'setting_type' => 1,
                'setting_group' => 'general',
                'created_at' => '2023-03-23 08:25:50',
                'updated_at' => '2023-03-23 08:25:50',
            ],
            11 => [
                'id' => 16,
                'setting_name' => 'map',
                'string_value' => null,
                'integer_value' => null,
                'text_value' => null,
                'boolean_value' => null,
                'setting_json' => null,
                'setting_custom' => '"{\\r\\n    \\"class\\": \\"map\\",\\r\\n    \\"id\\": \\"map\\"\\r\\n}"',
                'setting_type' => 3,
                'setting_group' => 'general',
                'created_at' => '2023-03-23 08:27:44',
                'updated_at' => '2023-03-23 08:27:44',
            ],
            12 => [
                'id' => 17,
                'setting_name' => 'address',
                'string_value' => null,
                'integer_value' => null,
                'text_value' => null,
                'boolean_value' => null,
                'setting_json' => null,
                'setting_custom' => '"{\\r\\n    \\"class\\": \\"address\\",\\r\\n    \\"id\\": \\"address\\",\\r\\n    \\"placeholder\\": \\"Address Here\\"\\r\\n}"',
                'setting_type' => 1,
                'setting_group' => 'general',
                'created_at' => '2023-03-23 08:28:27',
                'updated_at' => '2023-03-23 08:28:27',
            ],
        ]);
    }
}
