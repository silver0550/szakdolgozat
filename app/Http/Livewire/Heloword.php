<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;


class Heloword extends ModalComponent
{

    public static function modalMaxWidth():string
    {
        return 'sm';
    }

    public function render()
    {
        return view('livewire.heloword');
    }
}
