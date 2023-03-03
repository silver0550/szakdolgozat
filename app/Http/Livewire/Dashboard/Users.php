<?php

namespace App\Http\Livewire\Dashboard;

use App\Enums\notificationEnum;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    public $sortColumnName = 'id';
    public $sortDirection = 'asc';
    public $searchByName;

    public $pageSize = 15; //traitbe zárás

    public $notificationVisible = false;    
    public $notificationMessage;


    protected $listeners = [
        'sort',
        'delete',
        'create',
        'update',
    ];

    public function paginationView() // traitbe zárás
    {
        return 'components.pagination.body';
    }

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
            $this->notificationMessage = notificationEnum::DELETE_SUCCES;
        }   
    }

    public function create($user){

        if(Gate::authorize('create', auth()->user())){
            User::create($user);
        }

        $this->notificationVisible = true;
        $this->notificationMessage = notificationEnum::CREATE_SUCCES;
    }

    public function update($user){
        
        $current = User::find($user['id']);

        if(Gate::authorize('update', auth()->user())){
            $current->update($user);
        }

        $this->notificationVisible = true;
        $this->notificationMessage = notificationEnum::UPDATE_SUCCES; 

        $this->emitTo('dashboard.users-list','userRefresh'.$user['id']);
    }

    public function hydrate(){
        $this->reset('notificationVisible');
    }

    public function updatedPageSize(){
        $this->resetPage();
    }
   
    public function updatedSearchByName(){
        $this->resetPage();
    }   
   
}
