<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\User;

class Users extends Component
{

    public $users;

    protected $listeners = [
        'refresh' => '$refresh',
    ];

    public function mount(){
        $this->users = User::all();
    }

    public function render()
    {
        return view('livewire.dashboard.users')->layout('components.layouts.index');
    }
}
