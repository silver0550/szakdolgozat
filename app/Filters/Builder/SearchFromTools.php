<?php

namespace App\Filters\Builder;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Database\Query\Builder;

class SearchFromTools
{
    public function __construct(public String|null $what)
    {
        //
    }

    public function handle(Builder $query, Closure $next): Builder
    {
        if (!$this->what){
            return $next($query);
        }

        $usersId = User::where('name', 'LIKE', '%'.$this->what.'%')->select('id');

        return $next($query)->whereIn('user_id', $usersId);
    }
}