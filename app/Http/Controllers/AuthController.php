<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

class AuthController extends Controller
{
    public function logout(): RedirectResponse
    {
        activity('auth')->log('logout');

        Auth::logout();

        return redirect()->route('login');
    }
}
