<?php

namespace App\Http\Livewire\ToolView;

use App\Http\Requests\PrinterRequest;
use App\Models\Printer as PrinterModel;
class Printer extends BaseToolView
{
    public function mount()
    {
        $this->model = PrinterModel::class;
        $this->request = PrinterRequest::class;
    }

    public function render()
    {
        return view('livewire.tool-view.printer');
    }
}
