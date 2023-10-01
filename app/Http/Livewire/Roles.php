<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\View\View;
use Livewire\Component;

class Roles extends Component
{
    public $userId;
    public function render(): View
    {
        return view('livewire.roles')->layout('components.layouts.index');
    }
}
