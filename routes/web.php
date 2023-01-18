<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Livewire\Login\Login;

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

Route::middleware('auth')->get('/', function (){return redirect()->route('index');});

Route::middleware('auth')->get('/home', function(){return view('home');})->name('index');

Route::middleware('guest')->get('/login', Login::class)->name('login');



Route::get('/logout',[AuthController::class,'logout'])->name('logout');
