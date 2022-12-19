<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect()->route('home');
        }

        return view('login.login',['massage' => 'Hibás felhasználó név vagy jelszó']);
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
