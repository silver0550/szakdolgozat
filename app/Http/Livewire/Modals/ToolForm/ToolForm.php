<?php

namespace App\Http\Livewire\Modals\ToolForm;

use App\Models\Phone;
use App\Models\Tool;
use Illuminate\View\View;
use Livewire\Component;

class ToolForm extends Component
{
    const CREATE = 1;
    const EDIT = 2;

    public ?Tool $tool;
    public string $classType = Phone::class;
    private int $target = self::CREATE;

    public function mount(?Tool $tool = null): void
    {
        if($tool->owner) {
            $this->classType = $tool->owner::class;
            $this->target = self::EDIT;
        }
    }

    public function render(): View
    {
        return view('livewire.modals.tool-form.tool-form', ['target' => $this->target]);
    }
}
