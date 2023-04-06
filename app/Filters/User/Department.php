<?php

namespace App\Filters\User;

use Closure;
use App\Models\UserProperty;
use Illuminate\Contracts\Database\Query\Builder;

class department
{
    public function __construct(public String|null $department)
    {
        //
    }

    public function handle(Builder $query, Closure $next): Builder
    {
        if (!$this->department){
            return $next($query);
        }
        
        return $next($query)->when($this->department, function($query){
                            return $query->whereIn('id', UserProperty::where('department', $this->department)->select('user_id'));});
    }
}