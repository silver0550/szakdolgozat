<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Tool;
use App\Http\Traits\WithSelfPagination;
use App\Http\Traits\WithControlledTable;

class Tools extends Component
{

    use WithSelfPagination, WithControlledTable;

    protected $listeners = [
        'refresh' => '$refresh',
    ];

    public function render()
    {
        $tools = $this->setToolsFilters()
                    ->filteredData(Tool::with('owner','user'))
                    ->paginate($this->pageSize);

        return view('livewire.dashboard.tools',['tools' => $tools])->layout('components.layouts.index');
    }
}
