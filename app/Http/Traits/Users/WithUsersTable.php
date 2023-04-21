<?php

namespace App\Http\Traits\Users;

use App\Filters\Builder\Department;
use App\Filters\Builder\SortBy;
use App\Filters\Builder\SearchBy;
use App\Models\User;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Database\Eloquent\Builder;

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

    public function filteredUsers(Builder $users = null): Builder
    {
        if(!$users) { $users = User::query(); } 

        $filters = [
            (new SortBy($this->sortColumnName, $this->sortDirection)),
            (new department($this->departmentFilter)),
            (new SearchBy(['email', 'name'], $this->search)),
        ];

        return (new Pipeline(app()))->send($users)
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