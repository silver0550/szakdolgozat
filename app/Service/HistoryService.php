<?php

namespace App\Service;

use App\Http\Traits\WithSelfPagination;
use App\Interfaces\HistoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Spatie\Activitylog\Models\Activity;

class HistoryService implements HistoryInterface
{
    use WithSelfPagination;

    public function getActivities(Collection $filters): LengthAwarePaginator
    {
        return Activity::query()
            ->when($filters->get('causerId'),
                fn(Builder $query) => $query->where('causer_id', $filters->get('causerId')))
            ->when($filters->get('userId'),
                fn(Builder $query) => $query->where('subject_id', $filters->get('userId')))
            ->when($filters->get('type'),
                fn(Builder $query) => $query->where('subject_type', $filters->get('type')))
            ->when($filters->get('action'),
                fn(Builder $query) => $query->where('description', $filters->get('action')))
            ->when($filters->get('from_date'),
                fn(Builder $query) => $query->where('created_at', '>', $filters->get('from_date')))
            ->when($filters->get('to_date'),
                fn(Builder $query) => $query->where('created_at', '<', $filters->get('to_date')))
            ->orderByDesc('id')
            ->paginate($this->pageSize);
    }
}
