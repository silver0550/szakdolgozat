<?php

namespace App\Http\Livewire;

use App\Http\Traits\WithNotification;
use App\Interfaces\RoleServiceInterface;
use App\Models\User;
use Illuminate\View\View;
use Livewire\Component;

class Roles extends Component
{
    use WithNotification;

    public $userId;
    public $permissions;
    public $role;

    protected RoleServiceInterface $service;

    public function render(): View
    {
        $title = __('permissions.title');

        return view('livewire.roles', ['title' => $title])->layout('components.layouts.index');
    }

    public function boot(RoleServiceInterface $service): void
    {
        $this->service = $service;
    }

    public function mount(): void
    {
        $this->permissions = $this->service->getAllPermission();
    }

    public function belongsToRole(string $permission): ?bool
    {
        return $this->service->belongsToRole($this->role, $permission);
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
            $this->permissions->diffAssoc($this->service->getPermissionsByRole($this->role))->keys()
        ]);

        $this->alertSuccess(__('alert.update_permission_success'));
    }

    public function updatedUserId(): void
    {
        $this->permissions = $this->service->getPermissionsByUser($this->userId);
        $this->role = User::find($this->userId)?->getRoleNames()?->first();
    }

    public function updatedRole(): void
    {
        $this->permissions = $this->service->getPermissionsByRole($this->role);
    }
}
