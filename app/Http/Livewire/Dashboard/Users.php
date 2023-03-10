<?php

namespace App\Http\Livewire\Dashboard;

use App\Enum\Notification;
use Livewire\Component;
use App\Models\User;
use App\Models\UserProperty;
use Illuminate\Support\Facades\Gate;
use App\Http\Traits\WithSelfPagination;

class Users extends Component
{
    use WithSelfPagination;

    public $sortColumnName = 'id';
    public $sortDirection = 'asc';
    public $searchByName;

    public $notificationVisible = false;    
    public $notificationMessage;


    protected $listeners = [
        'sort',
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

    public function sort($type){
        if($type === $this->sortColumnName){
            $this->sortDirection = $this->sortDirection === 'asc' ?  'desc' : 'asc';
        } else {$this->sortDirection = 'asc';}

        $this->sortColumnName = $type;
    }

    public function delete(User $user){     //sorszám frissítés, vagy sorszám törlés
        if(Gate::authorize('delete',$user)){

            $user->delete();

            $this->notificationVisible = true;
            $this->notificationMessage = Notification::DELETE_SUCCES;
        }   
    }

    public function create($user, $property){

        dd($user, $property);
        if(Gate::authorize('create', auth()->user())){
            User::create($user);
        }

        $this->notificationVisible = true;
        $this->notificationMessage = Notification::CREATE_SUCCES;
    }

    public function update($user){
        
        $current = User::find($user['id']);

        if(Gate::authorize('update', auth()->user())){
            $current->update($user);
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
