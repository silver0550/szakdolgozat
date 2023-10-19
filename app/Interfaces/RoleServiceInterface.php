<?php

namespace App\Interfaces;

use Illuminate\Support\Collection;

interface RoleServiceInterface
{
    public function getAllPermission(): Collection;

    public function getPermissionsByRole(string $role): ?Collection;

    public function getPermissionsByUser(int $userId): ?Collection;

}
