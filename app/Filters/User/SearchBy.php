<?php

namespace App\Filters\User;

use Closure;
use Illuminate\Contracts\Database\Query\Builder;

class SearchBy
{
    public function __construct(public Array|null $where, public String|null $what)
    {
        //
    }

    public function handle(Builder $query, Closure $next): Builder
    {
        if (!$this->what){
            return $next($query);
        }

        if(count($this->where) === 1 ){
            return $next($query)->where($this->where[0], 'LIKE', '%'.$this->what.'%');
            
        }

        return $next($query)->where( function($query) {
            foreach($this->where as $where){
                $query->orWhere($where, 'LIKE', '%'.$this->what.'%');
            }
        });
    }
}