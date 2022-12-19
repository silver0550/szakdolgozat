<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('home');
});

Route::middleware('auth')->get('/home', function(){return view('home');})->name('home');

Route::middleware('guest')->get('/login', function () {
    return view('login.login');
});

Route::post('/login', [Authcontroller::class, 'login'])->name('login');

Route::get('/logout',[AuthController::class,'logout'])->name('logout');
