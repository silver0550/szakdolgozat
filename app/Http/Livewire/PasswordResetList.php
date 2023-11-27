<?php

namespace App\Http\Livewire;

use Illuminate\View\View;
use Livewire\Component;

class PasswordResetList extends Component
{
    public function __construct(public $user)
    {
    }

    public function render(): View
    {
        return view('livewire.password-reset-list');
    }
}
