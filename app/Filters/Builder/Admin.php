<?php

namespace App\Filters\Builder;

use Closure;
use Illuminate\Contracts\Database\Query\Builder;

class Admin
{
    public function __construct(public bool $isAdmin)
    {
        //
    }

    public function handle(Builder $query, Closure $next){

        return $next($query)->where('admin',$this->isAdmin);
    }


}