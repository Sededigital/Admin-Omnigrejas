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
        Route::get('church-scale')->name('churches.courses');
        Route::get('church-standard-cult')->name('churches.courses');
        Route::get('church-talent-map')->name('churches.courses');
        Route::get('church-calendar')->name('churches.courses');
        Route::get('church-courses')->name('churches.courses');
        Route::get('church-course-registered')->name('churches.courses');
        Route::get('church-progress-report')->name('churches.courses');
        Route::get('church--financial-moviment')->name('churches.courses');
        Route::get('church-financial-report')->name('churches.courses');
        Route::get('church-online-donations')->name('churches.courses');
        Route::get('church-volunteers')->name('churches.courses');
        Route::get('church-resources')->name('churches.courses');
        Route::get('church-pastoral-care')->name('churches.courses');
        Route::get('church-products')->name('churches.courses');
        Route::get('church-orders')->name('churches.courses');
        Route::get('church-payments')->name('churches.courses');


    });

    //** ROUTE COMUNICATIONs */
        Route::get('only-posts')->name('churches.courses');
        Route::get('comuninications')->name('churches.courses');
        Route::get('private-messages')->name('churches.courses');
        Route::get('church-chats')->name('churches.courses');
    Route::get('geral/list-users', ListUsers::class)->name('users.lisusers');
});
