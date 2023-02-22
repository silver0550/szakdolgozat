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

    public $newUser = [
        'name' => null,
        'email' => null,
    ];

    protected $listeners =[
        'resetAll',
        'create',
    ];

    protected $rules =[
        'newUser.name' => ['required'],
        'newUser.email' => ['required','email'],
    ];

    protected $messages =[
        'newUser.email.required' => 'Az e-mail mező kitöltése kötelező!',
        'newUser.email.email' => 'Hibás formátum!',
        'newUser.name.required' => 'Név mező mező kitöltése kötelező!',
    ];

    public function mount($for){
        $this->myID = $for;
    }

    public function resetAll(){
        $this->reset('newUser');
        $this->resetErrorBag();
    }

    public function create()
    {
        
        $credentials = $this->validate();
        dd('validated');
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
