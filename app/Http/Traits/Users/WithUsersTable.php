<?php

namespace App\Http\Traits\Users;

use App\Filters\User\department;
use App\Filters\User\SortBy;
use App\Filters\User\SearchBy;
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
            $this->sortDirection = ! $this->sortDirection ;
        } else {$this->sortDirection = true;}

        $this->sortColumnName = $type;
    }

    public function filteredUsers(): Builder
    {

        $filters = [
            (new SortBy($this->sortColumnName, $this->sortDirection)),
            (new department($this->departmentFilter)),
            (new SearchBy(['email', 'name'], $this->search)),
        ];

        $user = (new Pipeline(app()))->send(User::query())
                                    ->through($filters)
                                    ->thenReturn();

        return $user;
       
    }
    
    public function updatedSearch(){
        $this->resetPage();
    }   

    public function updatedDepartmentFilter(){
        $this->resetPage();
    }   


}