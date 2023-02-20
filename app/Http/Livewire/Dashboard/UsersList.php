<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class UsersList extends Component
{

    public User $user;
    public $index;

    protected $rules = [
        'user.admin' => ['required'],
    ];

    public function mount(User $user, Int $index){
        //        
    }

    public function update(){
        if(Gate::authorize('update', $this->user)){

            $this->user->save();
        }   
    }

    public function delete(){
        if(Gate::authorize('delete',$this->user)){

            $this->user->delete();
            $this->emitUp('refresh');            
        }   
    }

    public function render()
    {
        return view('livewire.dashboard.users-list');
    }
}
