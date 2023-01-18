<?php

namespace App\Http\Livewire\Login;


use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Http\Request;

class Login extends Component
{

    public $email;
    public $password;

    protected $rules =[
        'email' => ['required','email'],
        'password' => ['required']
    ];

    protected $messages =[
        'email.required' => 'Az e-mail mező kitöltése kötelező!',
        'email.email' => 'Hibás e-mail formátum!',
        'password.required' => 'Jelszó mező kitöltése kötelező!',
    ];

    public function login(Request $request){
        $credentials = $this->validate();
        
        if (Auth::attempt($credentials)){
            $request->session()->regenerate();

            activity()->log('login');
            
            return redirect()->route('index');
        }
        $this->addError('auth','Hibás felhasználónév, vagy jelszó');
        $this->reset('password');
        
    }

    public function render()
    {
        return view('livewire.login.login')->layout('layouts.login');
    }
}
