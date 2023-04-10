<?php

namespace App\Http\Traits\Users;

use App\Filters\User\department;
use App\Filters\User\SortBy;
use App\Filters\User\SearchBy;
use App\Models\User;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

trait WithUsersTable
{
    public $sortColumnName;
    public $sortDirection;
    public $search;

    public $departmentFilter;

    public function sort($type){
        if($type === $this->sortColumnName){
            $this->sortDirection = !$this->sortDirection ;
        } else {$this->sortDirection = true;}

        $this->sortColumnName = $type;
        
    }

    public function filteredUsers(Collection $users = null): Builder
    {
        if(!$users) { $users = User::all();} 

        $filters = [
            (new SortBy($this->sortColumnName, $this->sortDirection)),
            (new department($this->departmentFilter)),
            (new SearchBy(['email', 'name'], $this->search)),
        ];

        return (new Pipeline(app()))->send($users->toQuery())
                                    ->through($filters)
                                    ->thenReturn();
       
    }
    
    public function updatedSearch(){
        $this->resetPage();
    }   

    public function updatedDepartmentFilter(){
        $this->resetPage();
    }   


}