<?php

namespace App\Filters\Builder;

use Closure;
use Illuminate\Contracts\Database\Query\Builder;

class HasProperty
{
    public function __construct(public String $column, public mixed $data)
    {
        //
    }

    public function handle(Builder|null $query, Closure $next){

        if(!$query) { return null; }

        return $next($query)->where($this->column, $this->data);
    }


}