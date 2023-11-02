<?php

namespace App\Http\Livewire\ToolView;

use App\Http\Requests\WorkStationRequest;
use App\Models\WorkStation as WorkStationModel;
use Illuminate\View\View;

class WorkStation extends BaseToolView
{
    public function mount($tool): void
    {
        $this->model = WorkStationModel::class;
        $this->request = WorkStationRequest::class;

        if($tool) {
            $this->tool = $tool;
            $this->setData();
        }
    }
    public function render(): View
    {
        return view('livewire.tool-view.work-station');
    }
}
