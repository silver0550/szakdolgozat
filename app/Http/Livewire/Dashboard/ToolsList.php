<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\BaseTool;
use App\Models\ToolsView;
use Livewire\Component;

class ToolsList extends Component
{
    public ToolsView $tool;
    public BaseTool $model;

    public function mount(ToolsView $tool): void
    {
        $this->model = $tool->owner;
    }

    public function render()
    {
        return view('livewire.dashboard.tools-list');
    }
}
