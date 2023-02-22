<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class CreateUser extends Component
{
    public $name;
    public $email;
    public $myID;

    protected $listeners =[
        'resetAll',
        'create',
    ];

    protected $rules =[
        'email' => ['required','email'],
        'name' => ['required']
    ];

    protected $messages =[
        'email.required' => 'Az e-mail mező kitöltése kötelező!',
        'email.email' => 'Hibás formátum!',
        'password.required' => 'Jelszó mező kitöltése kötelező!',
    ];

    public function mount($for){
        $this->myID = $for;
    }

    public function resetAll(){
        $this->reset('name','email');
        $this->resetErrorBag();
    }

    public function create()
    {
        $credentials = $this->validate();
        if(Gate::authorize('create', auth()->user())){
            User::create($credentials);
        }
        redirect()->route('users');
        
    }

    public function render()
    {
        return view('livewire.create-user');
    }
}
