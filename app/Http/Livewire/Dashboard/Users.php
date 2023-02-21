<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Gate;


class Users extends Component
{
    public $sortColumnName = 'id';
    public $sortDirection = 'asc';

    public $pageSize = 15;
    public $currentPage = 0;


    protected $listeners = [
        'refresh' => '$refresh',
        'sort',
        'create'
    ];


    public function sort($type){
        if($type === $this->sortColumnName){
            $this->sortDirection = $this->sortDirection === 'asc' ?  'desc' : 'asc';
        } else {$this->sortDirection = 'asc';}

        $this->sortColumnName = $type;
    }

    public function updatedPageSize(){
        $this->reset('currentPage');
    }

    public function create(){
        dd('create');

        if(Gate::authorize('update')){

            $this->user->save();
        }   
    }

    public function render()
    {
        $users = User::where('email', '!=', env('SUPER_ADMIN'))
            ->orderBy($this->sortColumnName,  $this->sortDirection)
            ->get()
            ->chunk($this->pageSize);

        return view('livewire.dashboard.users',['users' => $users,])->layout('components.layouts.index');
    }
}
