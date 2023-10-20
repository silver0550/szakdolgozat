<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Builder;

interface ToolServiceInterface
{
    public function getFilteredTools(array $filters): Builder;
}
