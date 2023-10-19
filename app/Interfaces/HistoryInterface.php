<?php

namespace App\Interfaces;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface HistoryInterface
{
    public function getActivities(Collection $filters): LengthAwarePaginator;
}
