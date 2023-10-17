<?php

namespace App\Http\Livewire;

use App\Http\Traits\WithSelfPagination;
use App\Interfaces\HistoryInterface;
use App\Models\User;
use Livewire\Component;

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
        $activities = $this->service->getActivities(collect($this->filters));

        $title = __('side_menu.history');

        return view('livewire.history',[
            'title' => $title,
            'activities' => $activities,
        ])->layout('components.layouts.index');
    }

    public function isNotUser(): bool
    {
        if (isset($this->filters['type'])){

            return $this->filters['type'] != User::class;
        }

        return true;
    }

    public function updatedFilters()
    {
        $this->resetPage();
        if($this->isNotUser()){
            $this->filters['userId'] = null;
        }
    }
}
