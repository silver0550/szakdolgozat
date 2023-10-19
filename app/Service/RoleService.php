<?php

namespace App\Service;

use App\Interfaces\RoleServiceInterface;
use App\Models\User;
use Illuminate\Support\Collection;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleService implements RoleServiceInterface
{
    public function getAllPermission(): Collection
    {
        return Permission::all()
            ->pluck('name')
            ->mapWithKeys(fn($item) => [$item => false]);
    }

    public function getFormattedData($newPermissions): Collection
    {
        $formattedData = $this->getAllPermission();

        foreach ($formattedData as $key => $permission) {
            if ($newPermissions?->contains($key)) {
                $formattedData->put($key, true);
            }
        }

        return $formattedData;
    }

    public function getPermissionsByRole(string $role): ?Collection
    {
        return $this->getFormattedData(
            Role::query()
                ->whereName($role)
                ->first()
                ?->permissions
                ->pluck('name')
        );
    }

    public function getPermissionsByUser(int $userId): ?Collection
    {
        return $this->getFormattedData(
            User::find($userId)
                ?->getAllPermissions()
                ->pluck('name'));
    }

    public function belongsToRole($role, $permission)
    {
        return Role::query()
            ->whereName($role)
            ->first()
            ?->permissions
            ->pluck('name')
            ->contains($permission);
    }
}
