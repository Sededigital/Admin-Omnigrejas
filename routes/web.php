<?php

use App\Livewire\Auth\Login;
use Illuminate\Support\Facades\Route;

use App\Livewire\Admin\Super\Dashboard;
use App\Livewire\System\Geral\Users\ListUsers;

Route::get('/', function () {
    return redirect('login');
});


//** ROUTES PÚBLICAS */

Route::get('/login', Login::class)->name('login');


//**AUTHORIZE ROUTES**/
Route::middleware(['api.auth'])->group(function () {
    Route::get('dashboard-admin', Dashboard::class)->name('dashboard');
    Route::get('geral/list-users', ListUsers::class)->name('users.lisusers');
});
