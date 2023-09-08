<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Admin;
use App\Models\UserProperty;
use Spatie\Permission\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        UserProperty::factory()->create([
            'user_id' => User::factory()->create([
                            'name' => 'Super Admin',
                            'email' => 'super@admin.com',
                        ]),
        ]);

        UserProperty::factory()->create([
            'user_id' => User::factory()->create([
                            'name' => 'Admin',
                            'email' => 'admin@admin.com',
                        ]),
        ]);

        User::find(1)->assignRole('system');
        User::find(2)->assignRole('admin');

        UserProperty::factory(50)->create();


    }
}
