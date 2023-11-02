<?php

namespace App\Http\Livewire\Modals;

use Illuminate\View\View;
use LivewireUI\Modal\ModalComponent;

class NewToolForm extends ModalComponent
{
    protected $listeners = [
        'close',
    ];

    public function render(): View
    {
        return view('livewire.modals.new-tool-form');
    }

    public function close(): void
    {
        $this->closeModalWithEvents(['refresh']);
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
