<?php

namespace App\Http\Livewire\Login;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Http\Request;
use App\Filters\ByDateOfBirth;
use App\Models\User;
use Illuminate\Pipeline\Pipeline;

class Login extends Component
{

    public $email;
    public $password;

    public $result;

    protected $rules =[
        'email' => ['required','email'],
        'password' => ['required']
    ];

    protected $messages =[
        'email.required' => 'Az e-mail mező kitöltése kötelező!',
        'email.email' => 'Hibás formátum!',
        'password.required' => 'Jelszó mező kitöltése kötelező!',
    ];

    public function login(Request $request){
        $credentials = $this->validate();
        
        if (Auth::attempt($credentials)){
            $request->session()->regenerate();

            activity()->log('login');
            
            return redirect()->route('home');
        }
        $this->addError('auth','Hibás felhasználónév, vagy jelszó');
        $this->reset('password');
        
    }

    public function render()
    {
        return view('livewire.login.login')->layout('components.layouts.login');
    }
}
