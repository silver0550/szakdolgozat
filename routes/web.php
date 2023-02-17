<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Login\Login;
use App\Http\Livewire\Main\Home;
use App\Http\Livewire\Dashboard\Users;
use App\Http\Livewire\Main\DashBoard;

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

Route::middleware('auth')->get('/', function (){return redirect()->route('home');});

Route::middleware('guest')->get('/login', Login::class)->name('login');



Route::middleware('auth')->get('/home', Home::class)->name('home');
Route::middleware('auth')->get('/user', Users::class)->name('users');



Route::middleware('auth')->get('/dashboard',DashBoard::class)->name('dashboard');

Route::get('/logout',[AuthController::class,'logout'])->name('logout');
