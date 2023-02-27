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

    public $createModalVisible = false;
    public $createdVisible = false;
    public $userInfoVisible = false;

    public $notificationVisible = false;    
    public $notificationType;
    public $notificationMessage;


    protected $listeners = [
        'sort',
        'delete',

        // 'createUserToggle',
        // 'createdToggle',
        // 'userInfoToggle',
        // 'showInfo',
    ];

    public function paginationView() // traitbe zárás
    {
        return 'components.pagination.body';
    }

    public function render()
    {
        $users = User::where('email', '!=', env('SUPER_ADMIN'))
            ->where('name','LIKE','%'.$this->searchByName.'%')
            ->orderBy($this->sortColumnName,  $this->sortDirection)
            ->paginate($this->pageSize);

            return view('livewire.dashboard.users',['users' => $users,])->layout('components.layouts.index');
    }

    // public function createUserToggle(){
    //     $this->createModalVisible = $this->createModalVisible ? false : true;
    // }

    // public function createdToggle(){
    //     $this->createdVisible = $this->createdVisible ? false : true;
    // }

    // public function userInfoToggle(){
    //     $this->userInfoVisible = $this->userInfoVisible ? false : true;
    // }

    // public function showInfo(User $user){
        
    //     $this->userInfoToggle();
    // }

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
            $this->notificationType = 'success';
            $this->notificationMessage = notificationEnum::DELETE_SUCCES;

        }   
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
