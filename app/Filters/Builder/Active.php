<?php

namespace App\Filters\Builder;

use Closure;
use Illuminate\Contracts\Database\Query\Builder;

class Active
{

    public function handle(Builder $query, Closure $next){

        return $next($query)->where('is_active', true);
    }


}
