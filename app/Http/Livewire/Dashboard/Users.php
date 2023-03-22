<?php

namespace App\Http\Livewire\Dashboard;

use App\Enum\Notification;
use Livewire\Component;
use App\Models\User;
use App\Models\UserProperty;
use Illuminate\Support\Facades\Gate;
use App\Http\Traits\WithSelfPagination;
use App\Http\Traits\WithSortedTable;

class Users extends Component
{
    use WithSelfPagination, WithSortedTable;

    protected $listeners = [
        'delete',
        'create',
        'update',
    ];

    public function render()
    {
        $users = User::where('name','LIKE','%'.$this->searchByName.'%')
            ->orderBy($this->sortColumnName,  $this->sortDirection)
            ->paginate($this->pageSize);

            return view('livewire.dashboard.users',['users' => $users,])->layout('components.layouts.index');
    }

    public function delete(User $user){ // delete funkció nincs használva

        if(Gate::authorize('delete', $user)){ 
            $user->property()->first()->delete();
            $user->delete();

            $this->notificationVisible = true;
            $this->notificationMessage = Notification::DELETE_SUCCES;
        }   
    }

    public function create($user, $property){

        
        if(Gate::authorize('create', auth()->user())){
            $currentUser = User::create($user);

            $property['user_id'] = $currentUser->id;
            
            UserProperty::create($property);
        }

        $this->notificationVisible = true;
        $this->notificationMessage = Notification::CREATE_SUCCES;
    }

    public function update($user, $property){
        
        $currentUser = User::find($user['id']);

        if(Gate::authorize('update', auth()->user())){
            $currentUser->update($user);
            
            if ($currentUser->property()->first()){

                $currentUser->property()->first()->update($property);

            } else{
                
                $property['user_id'] = $currentUser->id;
                
                UserProperty::create($property);
            }
        }

        $this->notificationVisible = true;
        $this->notificationMessage = Notification::UPDATE_SUCCES; 

        $this->emitTo('dashboard.users-list','userRefresh'.$user['id']);
    }

    public function hydrate(){
        $this->reset('notificationVisible');
    }

    public function updatedSearchByName(){
        $this->resetPage();
    }   
   
}
