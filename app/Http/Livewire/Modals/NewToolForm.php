<?php

namespace App\Http\Livewire\Modals;

use LivewireUI\Modal\ModalComponent;


class NewToolForm extends ModalComponent
{
    public function render()
    {
        return view('livewire.modals.new-tool-form');
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
