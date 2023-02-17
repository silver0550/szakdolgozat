<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function logout(){
        
        activity()->log('logout');
        
        Auth::logout();
        
        return redirect()->route('login');
    }
}
