<?php

namespace App\Http\Livewire\Dashboard;

use App\Http\Traits\WithSelfPagination;
use App\Interfaces\ToolServiceInterface;
use App\Service\ToolService;
use Illuminate\View\View;
use Livewire\Component;

class Tools extends Component
{
    use WithSelfPagination;

    public array $filters = [];

    private ToolService $service;

    protected $listeners = [
        'refresh' => '$refresh',
    ];

    public function render(): View
    {
        $tools = $this->service->getFilteredTools($this->filters)->paginate($this->pageSize);

        return view('livewire.dashboard.tools', [
            'tools' => $tools,
            'title' => __('tool.tools')
        ])->layout('components.layouts.index');
    }

    public function boot(ToolServiceInterface $service): void
    {
        $this->service = $service;
    }

    public function updatedFilters(){
        $this->resetPage();
    }
}
