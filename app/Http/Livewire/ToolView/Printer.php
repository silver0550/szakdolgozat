<?php

namespace App\Http\Livewire\ToolView;

use App\Http\Requests\PrinterRequest;
use App\Models\Printer as PrinterModel;
use Illuminate\View\View;

class Printer extends BaseToolView
{
    public function mount(): void
    {
        $this->model = PrinterModel::class;
        $this->request = PrinterRequest::class;
    }

    public function render(): View
    {
        return view('livewire.tool-view.printer');
    }
}
