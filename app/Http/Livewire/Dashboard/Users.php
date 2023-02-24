<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    public $sortColumnName = 'id';
    public $sortDirection = 'asc';

    public $pageSize = 15;

    public $createModalVisible = false;
    public $createdVisible = false;
    public $userInfoVisible = false;

    public $searchByName;
    

    protected $listeners = [
        'refresh' => '$refresh',
        'sort',
        'createUserToggle',
        'createdToggle',
        'userInfoToggle',
        'showInfo',
    ];

    public function paginationView()
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

    public function createUserToggle(){
        $this->createModalVisible = $this->createModalVisible ? false : true;
    }

    public function createdToggle(){
        $this->createdVisible = $this->createdVisible ? false : true;
    }

    public function userInfoToggle(){
        $this->userInfoVisible = $this->userInfoVisible ? false : true;
    }

    public function showInfo(User $user){
        
        $this->userInfoToggle();
    }

    public function sort($type){
        if($type === $this->sortColumnName){
            $this->sortDirection = $this->sortDirection === 'asc' ?  'desc' : 'asc';
        } else {$this->sortDirection = 'asc';}

        $this->sortColumnName = $type;
    }

    public function updatedPageSize(){
        $this->gotoPage(1);
    }
   
    public function updatedSearchByName(){
        $this->gotoPage(1);
    }
   
}
