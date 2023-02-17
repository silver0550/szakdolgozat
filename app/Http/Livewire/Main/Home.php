<?php

namespace App\Http\Livewire\Main;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.main.home')->layout('components.layouts.index');
    }
}
