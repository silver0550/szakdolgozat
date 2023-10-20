<?php

namespace App\Http\Livewire\Login;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Livewire\Component;
use Illuminate\Http\Request;

class Login extends Component
{
    public ?string $email = null;
    public ?string $password = null;

    protected array $rules =[
        'email' => ['required','email'],
        'password' => ['required']
    ];

    public function login(Request $request)
    {
        $credentials = $this->validate();

        if (Auth::attempt($credentials)){
            $request->session()->regenerate();
            activity()->log('login');

            return redirect()->route('home');
        }

        $this->addError('auth',__('login.auth_error'));
        $this->reset('password');
    }

    public function render(): View
    {
        return view('livewire.login.login')->layout('components.layouts.login');
    }
}
