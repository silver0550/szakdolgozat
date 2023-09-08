<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    const DEFAULT_ROLES = [
        'system',
        'admin',
        'leader',
        'user'
    ];

    public function run(): void
    {
        foreach (self::DEFAULT_ROLES as $role) {
            Role::query()->firstOrCreate([
                'name' => $role,
            ]);
        }
    }
}

