<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;

class PasswordResetList extends Component
{

    public $isActive;

    public function __construct( public $user)
    {
        //
    }
  

    public function render()
    {
        return view('livewire.password-reset-list');
    }



}
