<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Contracts\Services\IsTool;

class ToolsList extends Component
{

    public IsTool $tool;

    public function mount( IsTool $tool)
    {
        //
    }

    public function render()
    {
        return view('livewire.dashboard.tools-list');
    }
}
