<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Admin;
use App\Models\UserProperty;
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

        Admin::factory()->create(['user_id' => 1]);
        Admin::factory()->create(['user_id' => 2]);
        
        UserProperty::factory(50)->create();


    }
}
