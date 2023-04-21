<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Admin;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class UsersList extends Component
{

    public User $user;
    public $index;
    public $isAdmin;

    protected $listeners = [];

    public function booted(){
        $this->listeners = array_merge($this->listeners, ['userRefresh'.$this->user->id => '$refresh']);
        // dd($this->listeners);
    }


    public function mount(User $user, Int $index){
        
        $this->isAdmin = $this->user->isAdmin ? true : false;
        
    }

    public function setAdmin(){
        
        if(auth()->user()->can('SuperAdmin')){
            $this->isAdmin ? 
                        Admin::create(['user_id' => $this->user->id]) :
                        Admin::whereRelation('user', 'user_id', $this->user->id)->delete();
        }
        $this->emitSelf('userRefresh'.$this->user->id);
    }

    public function render()
    {
        return view('livewire.dashboard.users-list');
    }


}
