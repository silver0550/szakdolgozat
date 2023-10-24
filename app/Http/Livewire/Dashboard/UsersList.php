<?php

namespace App\Http\Livewire\Dashboard;

use Illuminate\View\View;
use Livewire\Component;
use App\Models\User;

class UsersList extends Component
{
    public User $user;

    protected $listeners = [];

    public function booted(): void
    {
        $this->listeners = array_merge($this->listeners, ['userRefresh'.$this->user->id => '$refresh']);
    }

    public function mount(User $user): void
    {
        $this->isAdmin = $this->user->isAdmin ? true : false;
    }

    public function render(): View
    {
        return view('livewire.dashboard.users-list');
    }
}
