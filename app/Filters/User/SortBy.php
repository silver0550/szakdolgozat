<?php

namespace App\Filters\User;

use Closure;
use Illuminate\Contracts\Database\Query\Builder;

class SortBy
{
    protected $direction;
    protected $column; 

    public function __construct(String|null $column = 'id', bool|null $asc = true)
    {
        if (!$column) { $this->column = 'id';}
        if (!$asc) { $asc = true;}

        $this->direction = $asc ? 'asc' : 'desc';
    }

    public function handle(Builder $query, Closure $next): Builder
    {
        return $next($query)->orderBy($this->column, $this->direction);
    }


}