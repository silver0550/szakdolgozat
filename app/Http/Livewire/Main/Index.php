<?php

namespace App\Http\Livewire\Main;

use App\Services\sidebarService;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    public $currentPage = 'selfpage';
    public $user;
    public $menu;

    public $dashboard;

    protected $listeners =[
        'change',
    ];

    public function mount(){
        $this->user = auth()->user();

        $this->menu = $this->user->isadmin ? collect(sidebarService::newSidebar()->withAdmin()->menu)->map(fn($i) => collect($i)) : collect(sidebarService::newSidebar()->menu)->map(fn($i) => collect($i));
        
    }

    public function hydrate(){
        $this->menu = $this->user->isadmin ? collect(sidebarService::newSidebar()->withAdmin()->menu)->map(fn($i) => collect($i)) : collect(sidebarService::newSidebar()->menu)->map(fn($i) => collect($i));
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
