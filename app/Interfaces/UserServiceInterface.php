<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Builder;

interface UserServiceInterface
{
    public function getFilteredUsers(array $filters, array $sorter): Builder;
}
