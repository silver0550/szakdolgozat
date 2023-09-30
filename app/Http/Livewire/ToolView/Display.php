<?php

namespace App\Http\Livewire\ToolView;

use App\Http\Requests\DisplayRequest;
use App\Models\Display as DisplayModel;
use App\Models\Tool;
use Illuminate\View\View;

class Display extends BaseToolView
{
    public function mount($tool): void
    {
        $this->model = DisplayModel::class;
        $this->request = DisplayRequest::class;

        if($tool) {
            $this->tool = $tool;
            $this->setData();
        }
    }
    public function render(): View
    {
        return view('livewire.tool-view.display');
    }
}
