<?php

namespace App\Http\Livewire\Main;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $page ='';
    public $user;

    public $menuOptions = [
        ['name' => 'Áttekintés', 'icon' => 'icon-home', 'function' => 'createShowMe'],
        ['name' => 'Kimutatás', 'icon' => 'icon-exit', 'function' => 'createHome'],
        ['name' => 'Keresés', 'icon' => 'icon-search', 'function' => 'createSearch'],
        ['name' => 'Kilépés', 'icon' => 'icon-exit', 'function' => 'logout'],
    ];

    public function mount(){
        $this->user = auth()->user();
    }

    public function createShowMe(){
        $this->page = 'ShowMe work';
    }

    public function logout(){

        activity()->log('logout');
        
        Auth::logout();
        
        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.main.index')->layout('layouts.index');
    }
}
