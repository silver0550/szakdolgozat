<?php

namespace App\Http\Livewire\Dashboard;

use App\Http\Traits\WithControlledTable;
use App\Http\Traits\WithSelfPagination;
use App\Models\ToolsView;
use Livewire\Component;

class Tools extends Component
{
    use WithSelfPagination;
    use WithControlledTable;

    protected $listeners = [
        'refresh' => '$refresh',
    ];

    public function render()
    {
        $tools = $this->setToolsFilters()
            ->filteredData(ToolsView::with('owner', 'user'))
            ->paginate($this->pageSize);

        return view('livewire.dashboard.tools', ['tools' => $tools])->layout('components.layouts.index');
    }
}
