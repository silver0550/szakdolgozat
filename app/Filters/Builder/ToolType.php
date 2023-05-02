<?php

namespace App\Filters\Builder;

use Closure;
use Illuminate\Contracts\Database\Query\Builder;

class ToolType
{
    public function __construct(public String|null $type)
    {
        //
    }

    public function handle(Builder $query, Closure $next): Builder
    {
        if (!$this->type){
            return $next($query);
        }

        return $next($query)->where('owner_type', $this->type);
    }
}