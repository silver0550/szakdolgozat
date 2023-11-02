<?php

namespace App\Http\Livewire\ToolView;

use App\Http\Requests\TabletRequest;
use App\Models\Tablet as TabletModel;
use Illuminate\View\View;

class Tablet extends BaseToolView
{
    public function mount($tool): void
    {
        $this->model = TabletModel::class;
        $this->request = TabletRequest::class;

        if($tool) {
            $this->tool = $tool;
            $this->setData();
        }
    }

    public function render(): View
    {
        return view('livewire.tool-view.tablet');
    }
}
