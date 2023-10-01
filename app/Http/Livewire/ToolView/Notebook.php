<?php

namespace App\Http\Livewire\ToolView;

use App\Http\Requests\NotebookRequest;
use App\Models\Notebook as NotebookModel;
use App\Models\Tool;
use Illuminate\View\View;

class Notebook extends BaseToolView
{
    public function mount($tool): void
    {
        $this->model = NotebookModel::class;
        $this->request = NotebookRequest::class;

        if($tool) {
            $this->tool = $tool;
            $this->setData();
        }
    }

    public function render(): View
    {
        return view('livewire.tool-view.notebook');
    }
}
