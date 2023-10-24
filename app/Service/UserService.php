<?php

namespace App\Service;

use App\Interfaces\UserServiceInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class UserService implements UserServiceInterface
{
    public function getFilteredUsers(array $filters, array $sorter): Builder
    {
        $filters = collect($filters);
        $sorter = collect($sorter);

        return User::query()
            ->when($filters->get('department'),
                fn(Builder $query) => $query->whereHas('property',
                    fn(Builder $subQuery) => $subQuery->where('department', $filters->get('department'))))
            ->when($filters->get('search'),
                fn(Builder $query) => $query->where(
                    fn(Builder $subQuery) => $subQuery
                        ->orWhere('name', 'LIKE', '%' . $filters->get('search') . '%')
                        ->orWhere('email', 'LIKE', '%' . $filters->get('search') . '%')
                ))
            ->when($sorter->get('name'),
                fn(Builder $query) => $query
                    ->orderBy($sorter->get('name'), ($sorter->get('direction') ? 'asc' : 'desc')))
            ;
    }
}
