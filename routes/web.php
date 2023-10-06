<?php

use App\Http\Livewire\Assignment;
use App\Http\Livewire\History;
use App\Http\Livewire\Roles;
use App\Models\Tool;
use App\Models\User;
use Illuminate\Support\Facades\Route;

use App\Http\Livewire\Login\Login;
use App\Http\Livewire\Main\Home;
use App\Http\Livewire\Dashboard\Users;
use App\Http\Livewire\PasswordReset;

use App\Http\Controllers\AuthController;
use Spatie\Permission\Models\Permission;

use App\Http\Livewire\Dashboard\Tools;
use Spatie\Permission\Models\Role;

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

Route::middleware('auth')->group(function(){
    Route::get('/home', Home::class)->name('home');
    Route::get('/users', Users::class)->name('users');
    Route::get('/tools', Tools::class)->name('tools');
    Route::get('/search', Home::class)->name('search');
    Route::get('/assignment', Assignment::class)->name('assignment');
    Route::get('/roles', Roles::class)->name('roles');
    Route::get('/history', History::class)->name('history');
});

Route::middleware('admin')->group(function(){
    Route::get('/password-reset', PasswordReset::class)->name('password-reset');

});


Route::get('/logout',[AuthController::class,'logout'])->name('logout');

Route::get('/test', function(){
    User::find(2)->syncPermissions(['create-user']);
    dd(User::find(2)->getDirectPermissions());
});
