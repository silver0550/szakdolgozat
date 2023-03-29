<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\User;
use App\Models\UserProperty;
use Illuminate\Support\Facades\Gate;
use App\Enum\Notification;
use App\Http\Traits\WithSelfPagination;
use App\Http\Traits\Users\WithControlledTable;

class Users extends Component
{
    use WithSelfPagination, WithControlledTable;

    public $notificationVisible = false;    
    public $notificationMessage;
    
    protected $listeners = [
        'delete',
        'create',
        'update',
    ];

    public function render()
    {
      
        $users = $this->filteredUsers(); 

        return view('livewire.dashboard.users',['users' => $users,])->layout('components.layouts.index');
    }

    public function delete(User $user){ // delete function doesn't use

        $this->notificationMessage = 'Notification::DELETE_SUCCES'; // TODO: fail notifications


        if(auth()->user()->can('delete', $user)){ 
            $user->property()->first()->delete();
            $user->delete();

            $this->notificationMessage = Notification::DELETE_SUCCES;
        } 
  
        $this->notificationVisible = true;
    }

    public function create($user, $property): Void
    {
        $this->notificationMessage = 'Notification::CREATE_SUCCES';

        if (auth()->user()->can("create", User::class)){
            $currentUser = User::create($user);

            $property['user_id'] = $currentUser->id;
            
            UserProperty::create($property);

            $this->notificationMessage = Notification::CREATE_SUCCES;
        }

        $this->notificationVisible = true;
    }

    public function update($user, $property): Void
    {

        $this->notificationMessage = 'Notification::UPDATE_SUCCES'; 
        
        $currentUser = User::find($user['id']);

        if(auth()->user()->can('update', $currentUser)){
            $currentUser->update($user);
            
            if ($currentUser->property()->first()){

                $currentUser->property()->first()->update($property);

            } else{
                
                $property['user_id'] = $currentUser->id;
                
                UserProperty::create($property);
            }
            
            $this->notificationMessage = Notification::UPDATE_SUCCES; 
    
            $this->emitTo('dashboard.users-list','userRefresh'.$user['id']);
        } 
        
        $this->notificationVisible = true;
    }

    public function hydrate(){
        $this->reset('notificationVisible');
    }

    public function updatedSearchByName(){
        $this->resetPage();
    }   
   
}
