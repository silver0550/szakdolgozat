<?php

namespace App\Http\Livewire\Main;

use App\Http\Livewire\DTO\sidebarDTO;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $currentPage = 'selfpage';
    public $user;
    
    public sidebarDTO $menu;

    
    protected $listeners =[
        'change',
    ];

    public function mount(){
        $this->user = auth()->user();


        $this->menu = $this->user->admin ? sidebarDTO::get()->asAdmin(): sidebarDTO::get();
    }

    public function hydrate(){
        $this->menu = $this->user->admin ? sidebarDTO::get()->asAdmin(): sidebarDTO::get();
    }

    public function change($page){

        if ($page ==='logout'){ $this->logout();}
        else {$this->currentPage = $page;}
        
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
