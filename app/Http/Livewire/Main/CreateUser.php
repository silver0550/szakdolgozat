<?php

namespace App\Http\Livewire\Main;

use Livewire\Component;
use App\Http\Livewire\DTO\UserDTO;
use App\Http\Livewire\Errors\userErrors;

class CreateUser extends Component
{

    public userDTO $dto;

    public $userId;

    public $name;
    public $email;
    public $post;

    protected $listeners = [
        'successful'
    ];

    public function successful(){
        $this->dto->successful = true;
    }

    protected $rules = [
        'name' => ['required'],
        'email' => ['required','email'],
        'post' => ['required','not_in:Beosztás']
    ];
    
    protected $messages = [
        'name.required' => 'A "Név" mező kitöltése kötelező!',
        'email.required' => 'Az "E-mail cím" mező kitöltése kötelező!',
        'email.email' => 'Ajon meg megfelelő e-mail címet!',
        'post' => 'A "Beosztás" mező kitöltése kötelező' ,
    ];

    public function save(){
        $this->validate();
        // TODO: save method
        $this->emitSelf('successful');
    }

    public function mount(){
        
        $this->dto = new UserDTO;
    }

    public function render()
    {
        return view('livewire.main.create-user');
    }
}
