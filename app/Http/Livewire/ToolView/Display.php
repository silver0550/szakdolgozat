<?php

namespace App\Http\Livewire\ToolView;

use App\Http\Requests\DisplayRequest;
use App\Models\Display as DisplayModel;
use Illuminate\View\View;

class Display extends BaseToolView
{
    public function mount(): void
    {
        $this->model = DisplayModel::class;
        $this->request = DisplayRequest::class;
    }
    public function render(): View
    {
        return view('livewire.tool-view.display');
    }
}
