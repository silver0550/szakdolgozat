<?php

namespace App\Http\Livewire\Main;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $page = 'selfPage';
    public $user;

    public $menuOptions = [
        ['name' => 'Áttekintés', 'icon' => 'icon-home', 'function' => 'selfPage'],
        ['name' => 'Kimutatás', 'icon' => 'icon-exit', 'function' => 'dashBoard'],
        ['name' => 'Keresés', 'icon' => 'icon-search', 'function' => 'search'],
        ['name' => 'Kilépés', 'icon' => 'icon-exit', 'function' => 'logout'],
    ];

    public function mount(){
        $this->user = auth()->user();
    }

    public function selfPage(){
        $this->page = 'self-page';
    }

    public function dashBoard(){
        $this->page = 'dash-board';
    }

    public function search(){
        $this->page = 'search';
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
