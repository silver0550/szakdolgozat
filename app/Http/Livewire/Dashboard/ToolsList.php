<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\BaseTool;
use Livewire\Component;

class ToolsList extends Component
{
    public BaseTool $tool;

    public function mount(BaseTool $tool)
    {
        //
    }

    public function render()
    {
        return view('livewire.dashboard.tools-list');
    }
}
