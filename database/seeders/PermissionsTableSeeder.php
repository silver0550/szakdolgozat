<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    private array $permissions = [
        ['name' => 'read-all-user'],
        ['name' => 'read-self-user'],
        ['name' => 'read-group-user'],
        ['name' => 'read-all-tool'],
        ['name' => 'read-self-tool'],
        ['name' => 'read-group-tool'],
        ['name' => 'create-user'],
        ['name' => 'edit-user'],
        ['name' => 'delete-user'],
        ['name' => 'create-tool'],
        ['name' => 'edit-tool'],
        ['name' => 'delete-tool'],
        ['name' => 'reset_password'],
        ['name' => 'set-permission'],
    ];
    public function run(): void
    {
        foreach ($this->permissions as $permission) {
            Permission::firstOrcreate($permission);
        }
    }
}
