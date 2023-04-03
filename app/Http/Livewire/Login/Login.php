<?php

namespace App\Http\Livewire\Login;

use App\Http\Traits\WithNotification;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\PasswordReset;

class Login extends Component
{
    use WithNotification;

    public $email;
    public $password;

    protected $listeners = [
        'forgotPassword'
    ];

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

    public function forgotPassword($user){
        
        if (!$user){

            return $this->sendFaildResponse('Az adatok nem felelnek meg a valóságak, vegye fel a kapcsolatot a rendszergazdával!');

        }

        $registration = new PasswordReset();
        
        $registration->email = $user['email'];

        // dd($registration);
        $registration->save();
        // TODO: forgott password táblábarögzíteni

        $this->sendSuccessResponse('A kérést továbítottuk az adminok irányába!');

    }

    public function render()
    {
        return view('livewire.login.login')->layout('components.layouts.login');
    }
}
