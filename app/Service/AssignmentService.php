<?php


namespace App\Service;

use App\Enum\StatusEnum;
use App\Interfaces\AssignmentServiceInterface;
use App\Models\Tool;
use Illuminate\Database\Eloquent\Collection;

class AssignmentService implements AssignmentServiceInterface
{
    public function getFilteredTools(array $includedIds, ?string $search): Collection
    {
        return Tool::with('view')
            ->whereNull('user_id')
            ->where('status', StatusEnum::ACTIVE)
            ->where(function ($query) use ($search, $includedIds) {
                $query->orWhereIn('id', $includedIds)
                    ->orWhereHas('view', function ($subQuery) use ($search) {
                        $subQuery->where('serial_number', 'LIKE', '%' . $search . '%');
                    });
            })->get();
    }

    public static function logAssignment(string $direction, $tool): void
    {
        activity('assignment')
            ->performedOn($tool->owner)
            ->withProperties([
                $direction === 'capture'
                    ? 'from_user'
                    : 'to_user' => $tool->user_id
            ])
            ->log($direction);
    }
}
