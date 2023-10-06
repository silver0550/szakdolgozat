<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    private array $roles = [
        'system',
        'admin',
        'leader',
        'user'
    ];

    public function run(): void
    {
        foreach ($this->roles as $role) {
            Role::query()->firstOrCreate([
                'name' => $role,
            ]);
        }
    }
}

