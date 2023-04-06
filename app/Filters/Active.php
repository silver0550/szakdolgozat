<?php

namespace App\Filters;

use Closure;
use Illuminate\Contracts\Database\Query\Builder;

class Active
{

    public function handle(Builder $query, Closure $next){

        return $next($query)->where('isActive', true);
    }


}