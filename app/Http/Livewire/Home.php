<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Home extends Component
{
    public $user;
    public $page;

    public $menuItems = [
        ['name' => 'Áttekintés', 'icon' => 'icon-home', 'page' => 'createHome'],
        ['name' => 'Kimutatás', 'icon' => 'icon-exit', 'page' => 'createHome'],
        ['name' => 'Keresés', 'icon' => 'icon-search', 'page' => 'createSearch'],
        ['name' => 'Kilépés', 'icon' => 'icon-exit', 'page' => 'logout'],
    
    ];

    public function mount($name, $menu)
    {
        $this->user = auth()->user();

        $this->adminMenuButton(); 
    }

    public function adminMenuButton(): void
    {
        if ($this->user->isadmin){
            array_unshift($this->menuItems, ['name' => 'Dasboard', 'icon' => 'icon-exit', 'page' => 'createDashboard']);
        }
    }

    public function createHome(){
        
        $this->page = 'Home is workd';
    }

    public function createSearch(){

        $this->page = 'Search workd';
    }

    public function createDashboard(){

        $this->page = 'Dashborad workd';
    }

    public function logout(){

        redirect()->route('logout');
    }

    public function render()
    {
        return view('livewire.home');
    }
}
