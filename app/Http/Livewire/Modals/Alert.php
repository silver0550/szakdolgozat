<?php

namespace App\Http\Livewire\Modals;

use LivewireUI\Modal\ModalComponent;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class Alert extends ModalComponent
{
    public $user;

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }

    public static function closeModalOnEscape(): bool
    {
        return false;
    }

    public static function closeModalOnClickAway(): bool
    {
        return false;
    }

    public function remove(){
        $this->emit('delete',$this->user);
        $this->closeModal();
    }

    public function mount(User $user){
        $this->user =$user;
    }

    public function render()
    {
        return view('livewire.modals.alert');
    }
}
