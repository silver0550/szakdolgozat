<?php

namespace App\Http\Livewire\ToolView;

use App\Http\Requests\SimCardRequest;
use App\Models\SimCard as SimCardModel;
use Illuminate\View\View;

class SimCard extends BaseToolView
{
    public function mount(): void
    {
        $this->model = SimCardModel::class;
        $this->request = SimCardRequest::class;
    }

    public function render(): View
    {
        return view('livewire.tool-view.sim-card');
    }
}
