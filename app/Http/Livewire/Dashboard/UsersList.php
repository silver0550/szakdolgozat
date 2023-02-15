<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class UsersList extends Component
{

    public User $user;

    protected $rules = [
        'user.admin' => ['required'],
    ];

    public function mount(User $user){
        $this->user = $user;
    }

    public function update(){
        if(Gate::authorize('update',[auth()->user()])){

            $this->user->save();
        }   
    }

    public function delete(){
        if(Gate::authorize('delete',[auth()->user()])){

            $this->user->delete();
            $this->emitUp('refresh');            
        }   
    }

    public function render()
    {
        return view('livewire.dashboard.users-list');
    }
}
