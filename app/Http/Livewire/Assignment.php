<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Assignment extends Component
{
    public function render()
    {
        $title = __('assignment.title');
        return view('livewire.assignment',['title' => $title])->layout('components.layouts.index');
    }
}
