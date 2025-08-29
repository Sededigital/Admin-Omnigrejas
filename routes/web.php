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
Route::middleware(['auth'])->group(function () {

    # => Route for Admin Or Root
    Route::get('dashboard-administrative', Dashboard::class)->name('dashboard-administrative');
    Route::get('dashboard-church')->name('dashboard.church');
    Route::get('dashboard-root')->name('dashboard.root');

    //**PREFIX CHURCHES  */
    Route::prefix('Churches/')->name('churces')->group(function(){
        Route::get('only-churches')->name('churches.only');
        Route::get('church-members')->name('churches.members');
        Route::get('church-ministries')->name('churches.ministries');
        Route::get('church-events')->name('churches.events');
        Route::get('church-items')->name('churches.shedules');
        Route::get('church-courses')->name('churches.courses');

    });

    Route::get('geral/list-users', ListUsers::class)->name('users.lisusers');
});
