<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run(): void
    {
        //admin permissions
        $adminRole = Role::find(Role::ADMIN);

        $allPermissions = Permission::pluck('name')->toArray();

        $adminRole->givePermissionTo($allPermissions);

        //lieder permissions
        $leaderRole = Role::find(Role::LEADER);
        $leaderPermissions = [
            'read-group-tool',
            'read-group-user',
        ];

        $leaderRole->givePermissionTo($leaderPermissions);

        //user permissions
        $leaderRole = Role::find(Role::USER);
        $leaderPermissions = [
            'read-self-tool',
            'read-self-user',
        ];

        $leaderRole->givePermissionTo($leaderPermissions);
    }
}
