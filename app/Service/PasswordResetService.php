<?php

namespace App\Service;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

class PasswordResetService
{
    public function getFilteredPasswordRequest(array $filters): Builder
    {
        $filters = collect($filters);

        return User::query()
            ->with(['pwReset','property'])
            ->whereHas('pwReset', fn($query) => $query->where('is_active', true))
            ->when($filters->get('search'),
                fn($query) => $query->where( function ($subQuery) use ($filters){
                    $subQuery->orWhere('name', 'LIKE', '%' . $filters->get('search') . '%')
                        ->orWhere('email', 'LIKE', '%' . $filters->get('search') . '%');
                }))
            ->when($filters->get('department'),
                fn($query) => $query->whereHas('property',
                    fn($subQuery) => $subQuery->where('department', $filters->get('department'))));
    }
}
