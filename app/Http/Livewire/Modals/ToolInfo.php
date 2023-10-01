<?php

namespace App\Http\Livewire\Modals;

use App\Models\Tool;
use Illuminate\View\View;
use LivewireUI\Modal\ModalComponent;

class ToolInfo extends ModalComponent
{
    public $tool;
    public string $class;

    protected $listeners = [
        'close',
    ];

    public function mount(int $tool): void
    {
        $this->tool = Tool::find($tool);
    }
    public function render(): View
    {
        return view('livewire.modals.tool-info');
    }

    // MODAL CONTROL

    public function close(): Void
    {
        $this->closeModal();
    }

    public static function modalMaxWidth(): string
    {
        return '5xl';
    }

    public static function closeModalOnEscape(): bool
    {
        return false;
    }

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }
}
