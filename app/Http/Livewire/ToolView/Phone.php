<?php

namespace App\Http\Livewire\ToolView;

use App\Http\Requests\PhoneRequest;
use App\Models\Phone as PhoneModel;
use App\Models\Tool;
use Illuminate\View\View;

class Phone extends BaseToolView
{
    public function mount($tool): void
    {
        $this->model = PhoneModel::class;
        $this->request = PhoneRequest::class;

        if($tool) {
            $this->tool = $tool;
            $this->setData();
        }
    }


    public function render(): View
    {
        return view('livewire.tool-view.phone');
    }
}
