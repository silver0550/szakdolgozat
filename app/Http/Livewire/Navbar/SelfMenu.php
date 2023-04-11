<?php

namespace App\Http\Livewire\Navbar;

use App\Models\User;
use Livewire\Component;

class SelfMenu extends Component
{
    public $user;

    public function mount($user){
        $this->user = User::find($user);
    }

    public function render()
    {
        return view('livewire.navbar.self-menu');
    }
}
