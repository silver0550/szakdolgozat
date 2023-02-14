<?php

namespace App\Http\Livewire\Main;

use Livewire\Component;
use App\Http\Livewire\DTO\UserDTO;
use App\Models\User;
use Illuminate\Support\Facades\Gate;

class CreateUser extends Component
{

    public userDTO $dto;

    public $userId;

    public $name;
    public $email;
    public $post;
    public $isAdmin = false;

    protected $listeners = [
        'successful'
    ];

    public function successful(){
        $this->dto->successful = true;
    }

    protected $rules = [
        'name' => ['required'],
        'email' => ['required','email','unique:Users,email'],
        'post' => ['required','not_in:Beosztás'],
    ];
    
    protected $messages = [
        'name.required' => 'A "Név" mező kitöltése kötelező!',
        'email.required' => 'Az "E-mail cím" mező kitöltése kötelező!',
        'email.email' => 'Ajon meg megfelelő e-mail címet!',
        'email.unique' => 'Az e-mail cím már használatban van',
        'post' => 'A "Beosztás" mező kitöltése kötelező' ,
    ];

    public function save(){
        $credentials = $this->validate();

        if (Gate::authorize('create',auth()->user())){
            $credentials = array_merge($credentials, ['admin' => $this->isAdmin]);
            User::create($credentials);
            $this->emitSelf('successful');
        } else{
            $this->addError('authorize','Nincs jogosultsága a kért művelethez, vegye fel a kapcsolatot a rendszergazdával.');
        }
        
    }

    public function mount(){
        
        $this->dto = new UserDTO;
    }

    public function render()
    {
        return view('livewire.main.create-user');
    }
}
