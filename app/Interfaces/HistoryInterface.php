<?php

namespace App\Interfaces;


use Illuminate\Database\Eloquent\Builder;

interface HistoryInterface
{
    public function getActivities(array $filters): Builder;
}
