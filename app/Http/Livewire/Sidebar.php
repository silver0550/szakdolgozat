<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Sidebar extends Component
{
    public $user;

    public $menuItems = [
        ['name' => 'Áttekintés', 'icon' => 'icon-home'],
        ['name' => 'Kimutatás', 'icon' => 'icon-exit'],
        ['name' => 'Keresés', 'icon' => 'icon-search'],
        ['name' => 'Kilépés', 'icon' => 'icon-exit'],
    
    ];

    public function mount($name, $menu)
    {
        $this->user = auth()->user();

        $this->adminMenuButton(); 
    }

    public function adminMenuButton(): void
    {
        if ($this->user->isadmin){
            array_unshift($this->menuItems, ['name' => 'Dasboard', 'icon' => 'icon-exit']);
        }
    }

    public function render()
    {
        return view('livewire.sidebar');
    }
}
