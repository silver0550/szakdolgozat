<?php

namespace App\Service;

use App\Enum\ActionEnum;
use App\Http\Traits\WithSelfPagination;
use App\Interfaces\HistoryInterface;
use App\Models\Tool;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Models\Activity;

class HistoryService implements HistoryInterface
{
    use WithSelfPagination;

    public function getActivities(array $filters): Builder
    {
        $filters = collect($filters);

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
            ->orderByDesc('id');
    }

    public function getReadableName(Activity $record): ?string
    {
        $action = ActionEnum::from($record->description);

        return match($action){
            ActionEnum::CREATE => $this->buildClassByActivity('attributes', $record)?->name
                ?? $this->buildClassByActivity('attributes', $record)?->serial_number,
            ActionEnum::DELETE => $this->buildClassByActivity('old', $record)?->name
                ?? $this->buildClassByActivity('old', $record)?->serial_number,
            ActionEnum::UPDATE => $this->buildClassByActivity('old', $record)?->name
                ?? $this->buildClassByActivity('old', $record)?->serial_number,
            ActionEnum::LOG_IN => '-',
            ActionEnum::LOG_OUT => '-',
            ACtionEnum::CAPTURE => User::withTrashed()
                    ->where('id', $record->properties['from_user'])
                    ->first()->name . '-tól',
            ACtionEnum::RELEASE => User::withTrashed()
                    ->where('id', $record->properties['to_user'])
                    ->first()->name . '-nak',
            default => null
        };
    }

    public function buildClassByActivity(string $property, Activity $record)  : Model
    {
        return (new $record->subject_type)->fill($record->properties[$property]);
    }
    public function getToolIdFromHistory(Activity $history): ?int
    {
        if($history->subject) {

            return Tool::query()
                ->where('owner_type', $history->subject::class)
                ->where('owner_id', $history->subject->id)
                ->first()
                ->id;
        }

        return null;
    }
}
