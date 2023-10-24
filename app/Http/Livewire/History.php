<?php

namespace App\Http\Livewire;

use App\Http\Traits\WithSelfPagination;
use App\Interfaces\HistoryInterface;
use App\Models\Tool;
use App\Models\User;
use Livewire\Component;
use Spatie\Activitylog\Models\Activity;

class History extends Component
{
    use WithSelfPagination;

    public array $filters = [];

    protected HistoryInterface $service;
    public function boot(HistoryInterface $service): void
    {
        $this->service = $service;
    }

    public function render()
    {
        $activities = $this->service
            ->getActivities($this->filters)
            ->paginate($this->pageSize);

        return view('livewire.history',[
            'title' => __('side_menu.history'),
            'activities' => $activities,
            'allUser' => User::all(),
        ])->layout('components.layouts.index');
    }

    public function getReadableName(Activity $record): ?string
    {
        return $this->service->getReadableName($record);
    }
    public function isNotUser(): bool
    {
        if (isset($this->filters['type'])){

            return $this->filters['type'] != User::class;
        }

        return true;
    }

    public function getToolFromHistory(Activity $history)
    {
        return Tool::query()
            ->where('owner_type', $history->subject::class)
            ->where('owner_id', $history->subject->id)
            ->first()
            ->id;
    }

    public function updatedFilters()
    {
        $this->resetPage();
        if($this->isNotUser()){
            $this->filters['userId'] = null;
        }
    }
}
