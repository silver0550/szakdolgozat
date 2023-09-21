<?php

namespace App\Http\Traits;

use App\Filters\Builder\Department;
use App\Filters\Builder\SortBy;
use App\Filters\Builder\SearchBy;
use App\Filters\Builder\ToolType;
use App\Filters\Builder\SearchFromTools;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Database\Eloquent\Builder;

trait WithControlledTable
{
    public $sortColumnName;
    public $sortDirection;
    public $search;

    public $departmentFilter;
    public $typeFilter;

    protected $filters = [];

    public function sort($type): void
    {
        if($type === $this->sortColumnName){
            $this->sortDirection = !$this->sortDirection ;
        } else {$this->sortDirection = true;}

        $this->sortColumnName = $type;
    }

    public function filteredData(Builder $models): Builder
    {
        $result = (new Pipeline(app()))->send($models)
                                    ->through($this->filters)
                                    ->thenReturn();
        $this->reset('filters');

        return $result;
    }

    public function setFilters(array $filters): self
    {
        $this->filters = $filters;

        return $this;
    }

    public function addFilter($filter): self
    {
        array_push($this->filters, $filter);

        return $this;
    }

    public function rmFilter($filter): self
    {
        unset($this->filters[array_search($filter, $this->filters)]);

        return $this;
    }

    public function setUsersFilters(): self
    {
        $this->filters = [
            (new SortBy($this->sortColumnName, $this->sortDirection)),
            (new department($this->departmentFilter)),
            (new SearchBy(['email', 'name'], $this->search)),
        ];

        return $this;
    }

    public function setToolsFilters(): self
    {
        $this->filters = [
            // (new SortBy($this->sortColumnName, $this->sortDirection)),
            (new ToolType($this->typeFilter)),
            (new SearchFromTools(['serial_number', 'user_id'], $this->search)),
        ];

        return $this;
    }

    public function updatedSearch(): void
    {
        $this->resetPage();
    }

    public function updatedDepartmentFilter(): void
    {
        $this->resetPage();
    }

    public function updatedTypeFilter(): void
    {
        $this->resetPage();
    }

}
