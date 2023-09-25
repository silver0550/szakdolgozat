<?php

namespace App\Http\Livewire\ToolView;

use App\Http\Requests\PhoneRequest;
use App\Models\Phone as PhoneModel;
use Illuminate\View\View;

class Phone extends BaseToolView
{
    public function mount(): void
    {
        $this->model = PhoneModel::class;
        $this->request = PhoneRequest::class;
    }

    public function render(): View
    {
        return view('livewire.tool-view.phone');
    }
}
