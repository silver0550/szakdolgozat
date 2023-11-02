<?php

namespace App\Http\Livewire\Modals;

use LivewireUI\Modal\ModalComponent;
use App\Models\User;

class UserInfo extends ModalComponent
{
    public User $user;

    public bool $readonly ;

    protected $listeners = [
        'close',
    ];

    public function mount(User $user){
        $this->user = $user;
        $this->readonly = user()->cannot('edit-user');
    }

    public function render()
    {
        return view('livewire.modals.user-info');
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
