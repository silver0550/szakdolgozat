<?php

namespace App\Filters\Builder;

use Closure;
use Illuminate\Contracts\Database\Query\Builder;

class SearchBy
{
    public function __construct(public array $where, public string|null $what)
    {
        //
    }

    public function handle(Builder $query, Closure $next): Builder
    {
        if (!$this->what) {
            return $next($query);
        }

        return $next($query)->where(function ($query) {
            foreach ($this->where as $where) {
                $query->orWhere($where, 'LIKE', '%' . $this->what . '%');
            }
        });
    }
}
