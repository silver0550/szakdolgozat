<?php

namespace App\Http\Livewire\Modals\ToolForm;

use App\Models\Phone;
use Illuminate\View\View;
use Livewire\Component;

class ToolForm extends Component
{

    public string $classType = Phone::class;

    public function render(): View
    {
        return view('livewire.modals.tool-form.tool-form');
    }
}
