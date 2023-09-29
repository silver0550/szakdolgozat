<?php

namespace App\Http\Livewire\Modals\ToolForm;

use App\Models\Phone;
use Illuminate\View\View;
use Livewire\Component;

class ToolForm extends Component
{

    public ?int $classId;
    public string $classType = Phone::class;
    public ?bool $readonly;

    public function mount(
        ?int $classId = null,
        ?string $classType = null,
        ?bool $readonly = null
        ): void
    {
        $this->classId = $classId;
        $this->classType = $classType ?? $this->classType;
        $this->readonly = $readonly;
    }
    public function render(): View
    {
        return view('livewire.modals.tool-form.tool-form');
    }
}
