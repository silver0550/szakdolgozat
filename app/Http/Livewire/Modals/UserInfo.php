<?php

namespace App\Http\Livewire\Modals;

use LivewireUI\Modal\ModalComponent;
use App\Models\User;

class UserInfo extends ModalComponent
{
    public User $user;
    public $label;
    public $readonly;

    protected $rules =[
        'user.name' => ['required'],
        'user.email' => ['required','email'],
    ];

    protected $messages =[
        'user.email.required' => 'Az e-mail mező kitöltése kötelező!',
        'user.email.email' => 'Hibás formátum!',
        'user.name.required' => 'Név mező kitöltése kötelező!',
    ];

    public function mount(User $user){
        $this->user = $user;
        $this->label = $user->name;
        $this->readonly = !(auth()->user()->admin);
        
    }

    public function update(){
        $this->validate();

        $this->emit('update', $this->user);

        $this->closeModal();
    }

    public function render()
    {
        return view('livewire.modals.user-info');
    }

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
}
