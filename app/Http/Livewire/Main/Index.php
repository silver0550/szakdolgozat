<?php

namespace App\Http\Livewire\Main;

use App\Services\sidebarService;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $page = 'self-page';
    public $user;

    public $menu;

    public function mount(){
        $this->user = auth()->user();

        $this->menu = sidebarService::newSidebar()->checkAdmin()->menu;

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
