<?php

namespace App\Http\Livewire\ToolView;

use App\Http\Requests\NotebookRequest;
use App\Models\Notebook as NotebookModel;
use Illuminate\View\View;

class Notebook extends BaseToolView
{
    public function mount(): void
    {
        $this->model = NotebookModel::class;
        $this->request = NotebookRequest::class;
    }

    public function render(): View
    {
        return view('livewire.tool-view.notebook');
    }
}
