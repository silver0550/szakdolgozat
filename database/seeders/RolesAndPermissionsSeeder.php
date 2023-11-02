<?php

namespace Database\Seeders;

use App\Enum\RoleEnum;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Query\Builder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{

        private Collection $allPermissions;
        private Collection $adminsPermissions;
        private Collection $leaderPermissions;
        private Collection $userPermissions;


    public function __construct()
    {
        $this->allPermissions = Permission::query()->pluck('name');
        $this->adminsPermissions = $this->allPermissions->reject(fn ($item) => $item == 'set-permission');
        $this->leaderPermissions = collect([
            'read-group-tool',
            'read-group-user',
            'read-self-tool',
            'read-self-user',
        ]);
        $this->userPermissions = collect([
            'read-self-tool',
            'read-self-user',
        ]);
    }

    public function run(): void
    {
        //system permissions
        Role::find(RoleEnum::SYSTEM)->syncPermissions($this->allPermissions);

        //admin permissions
        Role::find(RoleEnum::ADMIN)->syncPermissions($this->adminsPermissions);

        //lieder permissions
        Role::find(RoleEnum::LEADER)->syncPermissions($this->leaderPermissions);

        //user permissions
        Role::find(RoleEnum::USER)->syncPermissions($this->userPermissions);
    }
}
