<?php

namespace App\Http\Livewire\Modals;

use LivewireUI\Modal\ModalComponent;
use App\Models\User;
use App\Models\UserProperty;

class UserInfo extends ModalComponent
{
    public User $user;
    public UserProperty $property;
    public $label;
    public $readonly;

    protected $rules =[
        'user.name' => ['required'],
        'user.email' => ['required','email'],
        'property.isleader' => ['nullable'],
        'property.department' => ['required'],
    ];

    protected $messages =[
        'user.email.required' => 'Az e-mail mező kitöltése kötelező!',
        'user.email.email' => 'Hibás formátum!',
        'user.name.required' => 'Név mező kitöltése kötelező!',
    ];

    public function mount(User $user){
        $this->user = $user;
        $this->label = $user->name;

        $this->property = $user->property()->first();
        $this->readonly = !auth()->user()->can('update', $user);
        
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
