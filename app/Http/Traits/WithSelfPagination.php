<?php

namespace App\Http\Traits;

use Livewire\WithPagination;

trait WithSelfPagination
{
    use WithPagination;

    public $pageSize = 15;

    public function paginationView()
    {
        return 'components.pagination.body';
    }

    public function updatedPageSize(){
        $this->resetPage();
    }
}