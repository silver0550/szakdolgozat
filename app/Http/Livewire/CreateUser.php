<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Livewire\Component;

class CreateUser extends Component
{
 
    public $exit;

    public $newUser = [
        'name' => null,
        'email' => null,
    ];
    protected $listeners =[
        'create',
        'closeThePage',
    ];

    protected $rules =[
        'newUser.name' => ['required'],
        'newUser.email' => ['required','email','unique:users,email'],
    ];

    protected $messages =[
        'newUser.email.required' => 'Az e-mail mező kitöltése kötelező!',
        'newUser.email.email' => 'Hibás formátum!',
        'newUser.email.unique' => 'Az e-mail cím már használatban van!',
        'newUser.name.required' => 'Név mező mező kitöltése kötelező!',
    ];

    public function mount($exit)
    {   
        $this->exit = $exit;
    }

    public function closeThePage()
    {
        $this->reset('newUser');
        $this->resetErrorBag();

        $this->emitUp($this->exit);
    }

    public function create()
    {

        $credentials = $this->validate();    

        $credentials = $this->validate();
        if(Gate::authorize('create', auth()->user())){
            User::create($credentials['newUser']);
        }

        $this->emitSelf('closeThePage');
        $this->emitUp('createdToggle');

    }

    public function render()
    {
        return view('livewire.create-user');
    }
}
