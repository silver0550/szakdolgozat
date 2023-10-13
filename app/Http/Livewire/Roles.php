<?php

namespace App\Http\Livewire;

use App\Http\Traits\WithNotification;
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Roles extends Component
{
    use WithNotification;

    public $userId;
    public $permissions;
    public $role;

    public function render(): View
    {
        $title = __('permissions.title');
        return view('livewire.roles',['title' => $title])->layout('components.layouts.index');
    }

    public function mount(): void
    {
        $this->permissions = $this->getAllPermission();
    }

    public function getPermissionsByRole(): ?Collection
    {
        return $this->getFormattedData(
            Role::query()
                ->whereName($this->role)
                ->first()
                ?->permissions
                ->pluck('name')
        );
    }

    public function getPermissionsByUser(): ?Collection
    {
        return $this->getFormattedData(
            User::find($this->userId)
                ?->getAllPermissions()
                ->pluck('name'));
    }

    public function belongsToRole(string $permission): ?bool
    {
        return Role::query()
            ->whereName($this->role)
            ->first()
            ?->permissions
            ->pluck('name')
            ->contains($permission);
    }

    public function store(): void
    {
        if (user()->cannot('set-permission')) {
            $this->alertError(__('alert.access_denied'));

            return;
        }

        $user = User::find($this->userId);

        $user->syncRoles($this->role);
        $user->syncPermissions([
            $this->permissions->diffAssoc($this->getPermissionsByRole())->keys()
        ]);

        $this->alertSuccess(__('alert.update_permission_success'));
    }

    public function getAllPermission(): Collection
    {
        return Permission::all()
            ->pluck('name')
            ->mapWithKeys(fn($item) => [$item => false]);
    }

    public function getFormattedData($newPermissions): Collection
    {
        $result = $this->getAllPermission();

        foreach ($result as $key => $permission) {
            if ($newPermissions?->contains($key)) {
                $result->put($key, true);
            }
        }

        return $result;
    }

    public function updatedUserId(): void
    {
        $this->permissions = $this->getPermissionsByUser();
        $this->role = User::find($this->userId)?->getRoleNames()?->first();
    }

    public function updatedRole(): void
    {
        $this->permissions = $this->getPermissionsByRole();
    }
}
