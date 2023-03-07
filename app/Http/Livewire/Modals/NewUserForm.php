<?php

namespace App\Http\Livewire\Modals;


use LivewireUI\Modal\ModalComponent;
use App\Models\User;
use Livewire\WithFileUploads;

class NewUserForm extends ModalComponent
{
    use WithFileUploads;

    public User $user;
    public $avatar;

    protected $rules =[
        'user.name' => ['required'],
        'user.email' => ['required','email','unique:users,email'],
        'avatar' => ['image','nullable'],
    ];

    protected $messages =[
        'user.email.required' => 'Az e-mail mező kitöltése kötelező!',
        'user.email.email' => 'Hibás formátum!',
        'user.email.unique' => 'Az e-mail cím már használatban van!',
        'user.name.required' => 'Név mező kitöltése kötelező!',
        'avatar' => 'Csak kép formátum engedélyezett!',
    ];

    public function mount(){
        $this->user = new User;
    }

    public function save(){
        $this->validate();

        if ($this->avatar){
            $this->user->avatar_path = $this->avatar->store('avatars','public');
        }
        
        $this->emit('create', $this->user);

        $this->closeModal();
      
    }

    public function render()
    {
        return view('livewire.modals.new-user-form');
    }

    public static function modalMaxWidth(): string
    {
        return '3xl';
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
