<?php

namespace App\Http\Traits;


trait WithSortedTable
{
    public $sortColumnName = 'id';
    public $sortDirection = 'asc';
    public $searchByName;


    public function sort($type){
        if($type === $this->sortColumnName){
            $this->sortDirection = $this->sortDirection === 'asc' ?  'desc' : 'asc';
        } else {$this->sortDirection = 'asc';}

        $this->sortColumnName = $type;
    }


}