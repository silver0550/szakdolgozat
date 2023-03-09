<?php

namespace Database\Seeders;

use App\Models\UserProperty;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserPropertyseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->create([
            'name' => 'Super Admin',
            'email' => 'super@admin.com',
            'admin' => 1,
        ]);

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'admin' => 1,
        ]);
        UserProperty::factory(50)->create();
    }
}
