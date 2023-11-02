<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Collection;

interface AssignmentServiceInterface
{
    public function getFilteredTools(array $includedIds, ?string $search): Collection;
}
