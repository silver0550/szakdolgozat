<?php

namespace App\Http\Livewire\ToolView;

use App\Http\Requests\PrinterRequest;
use App\Models\Printer as PrinterModel;
use App\Models\Tool;
use Illuminate\View\View;

class Printer extends BaseToolView
{
    public function mount($tool): void
    {
        $this->model = PrinterModel::class;
        $this->request = PrinterRequest::class;

        if($tool) {
            $this->tool = $tool;
            $this->setData();
        }
    }

    public function render(): View
    {
        return view('livewire.tool-view.printer');
    }
}
