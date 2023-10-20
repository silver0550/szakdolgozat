<?php

namespace App\Service;

use App\Http\Traits\WithSelfPagination;
use App\Interfaces\ToolServiceInterface;
use App\Models\ToolsView;
use Illuminate\Database\Eloquent\Builder;

class ToolService implements ToolServiceInterface
{
    use WithSelfPagination;
    public function getFilteredTools(array $filters): Builder
    {
        $filters = collect($filters);

        return ToolsView::query()
            ->when($filters->get('type'),
                fn($query) => $query->where('owner_type', $filters->get('type')))
            ->when($filters->get('search'),
                fn($query) => $query->where(
                    fn($subQuery) => $subQuery->orWhereHas('user',
                        fn($subSubQuery) => $subSubQuery->where('name', 'LIKE', '%' . $filters->get('search') . '%'))
                        ->orWhere('serial_number', 'LIKE', '%' . $filters->get('search') . '%')));
    }
}
