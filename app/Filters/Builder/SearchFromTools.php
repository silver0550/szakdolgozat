<?php

namespace App\Filters\Builder;

use App\Models\User;
use Closure;
use Illuminate\Contracts\Database\Query\Builder;

class SearchFromTools
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

                if ($where == 'user_id') {
                    $usersId = User::where('name', 'LIKE', '%' . $this->what . '%')->select('id');
                    $query->orWhereIn('user_id', $usersId);
                } else {
                    $query->orWhere($where, 'LIKE', '%' . $this->what . '%');
                }
            }
        });
    }
}
