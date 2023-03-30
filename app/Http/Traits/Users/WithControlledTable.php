<?php

namespace App\Http\Traits\Users;

use App\Models\User;
use App\Models\UserProperty;

trait WithControlledTable
{
    public $sortColumnName = 'id';
    public $sortDirection = 'asc';
    public $search;

    public $departmentFilter;

    public function sort($type){
        if($type === $this->sortColumnName){
            $this->sortDirection = $this->sortDirection === 'asc' ?  'desc' : 'asc';
        } else {$this->sortDirection = 'asc';}

        $this->sortColumnName = $type;
    }

    public function filteredUsers(){

        return User::orderBy($this->sortColumnName,  $this->sortDirection)
                ->when($this->departmentFilter, function($query){
                    return $query->whereIn('id', UserProperty::where('department', $this->departmentFilter)->select('user_id'));})
                ->when($this->search, function ($query) {
                    return $query->where('name','LIKE','%'.$this->search.'%')
                                ->orWhere('email','LIKE','%'.$this->search.'%');})
                ->paginate($this->pageSize);
    }

    public function updatedSearch(){
        $this->resetPage();
    }   

    public function updatedDepartmentFilter(){
        $this->resetPage();
    }   


}