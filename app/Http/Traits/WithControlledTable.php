<?php

namespace App\Http\Traits;

use App\Filters\Builder\Department;
use App\Filters\Builder\SortBy;
use App\Filters\Builder\SearchBy;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Database\Eloquent\Builder;

trait WithControlledTable
{
    public $sortColumnName;
    public $sortDirection;
    public $search;

    public $departmentFilter;

    protected $filters = [];

    public function sort($type){
        if($type === $this->sortColumnName){
            $this->sortDirection = !$this->sortDirection ;
        } else {$this->sortDirection = true;}

        $this->sortColumnName = $type;
        
    }

    public function filteredUsers(Builder $models): Builder
    {
        $result = (new Pipeline(app()))->send($models)
                                    ->through($this->filters)
                                    ->thenReturn();
        $this->reset('filters');

        return $result;
       
    }

    public function setFilters(Array $filters){

        $this->filters = $filters;

        return $this;

    }

    public function addFilter($filter){

        array_push($this->filters, $filter);

        return $this;
    }

    public function rmFilter($filter){

        unset($this->filters[array_search($filter, $this->filters)]);
        
        return $this;
    }
    
    public function setUsersFilters(){

        $this->filters = [
            (new SortBy($this->sortColumnName, $this->sortDirection)),
            (new department($this->departmentFilter)),
            (new SearchBy(['email', 'name'], $this->search)),
        ];

        return $this;
    }

    public function updatedSearch(){
        $this->resetPage();
    }   

    public function updatedDepartmentFilter(){
        $this->resetPage();
    }   


}