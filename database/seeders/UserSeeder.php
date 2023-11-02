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
    public function run(): void
    {
        UserProperty::factory()->create([
            'user_id' => User::factory()->create([
                            'name' => 'Super Admin',
                            'email' => 'super@admin.com',
                        ]),
        ]);

        UserProperty::factory()->create([
            'user_id' => User::factory()->create([
                            'name' => 'Admin Bácsi',
                            'email' => 'admin@admin.com',
                        ]),
        ]);

        UserProperty::factory(50)->create();
    }
}
