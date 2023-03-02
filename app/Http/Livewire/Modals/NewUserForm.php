<?php

namespace App\Http\Livewire\Modals;


use LivewireUI\Modal\ModalComponent;
use App\Models\User;

class NewUserForm extends ModalComponent
{
    public User $user;

    // public $newUser = [
    //     'name' => null,
    //     'email' => null,
    // ];

    protected $rules =[
        'user.name' => ['required'],
        'user.email' => ['required','email','unique:users,email'],
    ];

    protected $messages =[
        'user.email.required' => 'Az e-mail mező kitöltése kötelező!',
        'user.email.email' => 'Hibás formátum!',
        'user.email.unique' => 'Az e-mail cím már használatban van!',
        'user.name.required' => 'Név mező kitöltése kötelező!',
    ];

    public function mount(){
        $this->user = new User;
    }

    public function save(){
        $this->validate();

        $this->emit('create', $this->user);

        $this->closeModal();
        // $credentials = $this->validate();
        // if(Gate::authorize('create', auth()->user())){
        //     User::create($credentials['newUser']);
        // }
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
