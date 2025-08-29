<?php

use Illuminate\Support\Facades\Route;


//** LOGIN USER */
use App\Livewire\Auth\Login;
use App\Livewire\Auth\VerifyEmail;
use App\Livewire\Auth\TwoFactorChallenge;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\ConfirmPassword;

//** DASHBOARDS */
use App\Livewire\Admin\Super\Dashboard;
use App\Livewire\Admin\Admin\Dashboard as AdminDashboard;
use App\Livewire\Admin\Root\Dashboard as RootDashboard;
//** END  */


//** USERS */
use App\Livewire\Profile\Show  as ProfileShow;
use App\Livewire\Profile\TwoFactorPage;


//** SRTART CHURCES Routes */
use App\Livewire\System\Geral\Users\ListUsers;
use App\Livewire\System\Geral\Church\Events\Scale;
use App\Livewire\System\Geral\Church\Events\Events;
use App\Livewire\System\Geral\Church\Courses\Courses;
use App\Livewire\System\Geral\Church\Events\Calendar;
use App\Livewire\System\Geral\Church\Members\Members;
use App\Livewire\System\Geral\Church\Events\Schedules;
use App\Livewire\System\Geral\Church\Members\TalentMap;
use App\Livewire\System\Geral\Church\Only\BibleReading;
use App\Livewire\System\Geral\Church\Only\OnlyChurches;
use App\Livewire\System\Geral\Church\Only\PastoralCare;
use App\Livewire\System\Geral\Church\Marketplace\Orders;
use App\Livewire\System\Geral\Church\Members\Volunteers;
use App\Livewire\System\Geral\Church\Settings\Resources;


use App\Livewire\System\Geral\Church\Events\StandardCult;
use App\Livewire\System\Geral\Church\Marketplace\Payments;
use App\Livewire\System\Geral\Church\Marketplace\Products;
use App\Livewire\System\Geral\Church\Ministries\Ministries;
use App\Livewire\System\Geral\Church\Courses\ProgressReport;
use App\Livewire\System\Geral\Church\Only\ChuchGoodPractices;
use App\Livewire\System\Geral\Church\Courses\CourseRegistered;
use App\Livewire\System\Geral\Church\Fincance\FinancialReport;
use App\Livewire\System\Geral\Church\Fincance\OnlineDonations;
use App\Livewire\System\Geral\Church\Fincance\FinancialMoviment;

//** END CHURCHES ROUTES */


Route::get('/', function () {
    return redirect('login');
});


//** PUBLIC ROUTES */

Route::get('/login', Login::class)->name('login')->middleware('guest');
//** */ Route::get('/register', Register::class)->name('register');
Route::get('/forgot-password', ForgotPassword::class)->name('password.request');
Route::get('/reset-password/{token}', ResetPassword::class)->name('password.reset');
Route::get('/verify-email', VerifyEmail::class)->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (Illuminate\Foundation\Auth\EmailVerificationRequest $request) {
    $request->fulfill();

    $user = $request->user();
    $dashboardRoute = $user->redirectDashboardRoute();

    return redirect()->route($dashboardRoute)->with('status', 'Email verificado com sucesso!');

})->middleware(['auth', 'signed'])->name('verification.verify');


Route::get('/confirm-password', ConfirmPassword::class)->name('password.confirm');

// Rota de desafio 2FA (acessível sem autenticação completa)
Route::get('/two-factor-challenge', TwoFactorChallenge::class)->name('two-factor.login');

//**AUTHORIZE ROUTES**/
Route::middleware(['auth'])->group(function () {
    // Rotas que requerem email verificado
    Route::middleware(['verified'])->group(function () {
        // Rotas que requerem 2FA completo
        Route::middleware(['2fa'])->group(function () {

    # => Route for Admin Or Root
        Route::get('dashboard-administrative', Dashboard::class)->name('dashboard.administrative');
        Route::get('dashboard-church', AdminDashboard::class)->name('dashboard.church');
        Route::get('dashboard-root', RootDashboard::class)->name('dashboard.root');
        Route::get('geral/list-users', ListUsers::class)->name('users.lisusers');


    //**PREFIX CHURCHES  */
    Route::prefix('churches/')->name('churces')->group(function(){
        Route::get('only-churches', OnlyChurches::class)->name('churches.only');
        Route::get('church-bible-reading', BibleReading::class)->name('churches.bible-reading');
        Route::get('church-good-practices', ChuchGoodPractices::class)->name('churches.good-pratices');
        Route::get('church-pastoral', OnlyChurches::class)->name('churches.pastoral');
        Route::get('church-members', Members::class)->name('churches.members');
        Route::get('church-ministries', Ministries::class)->name('churches.ministries');
        Route::get('church-events', Events::class)->name('churches.events');
        Route::get('church-schedules', Schedules::class)->name('churches.schedules');
        Route::get('church-scale', Scale::class)->name('churches.scale');
        Route::get('church-standard-cult', StandardCult::class)->name('churches.standard-cult');
        Route::get('church-talent-map', TalentMap::class)->name('churches.talent-map');
        Route::get('church-calendar', Calendar::class)->name('churches.calendar');
        Route::get('church-courses', Courses::class)->name('churches.courses');
        Route::get('church-course-registered', CourseRegistered::class)->name('churches.course-registered');
        Route::get('church-progress-report', ProgressReport::class)->name('churches.progress-report');
        Route::get('church-financial-moviment', FinancialMoviment::class)->name('churches.financial-moviment');
        Route::get('church-financial-report', FinancialReport::class)->name('churches.financial-report');
        Route::get('church-online-donations', OnlineDonations::class)->name('churches.online-donations');
        Route::get('church-volunteers', Volunteers::class)->name('churches.volunteers');
        Route::get('church-resources', Resources::class)->name('churches.resources');
        Route::get('church-pastoral-care', PastoralCare::class)->name('churches.pastoral-care');
        Route::get('church-products', Products::class)->name('churches.products');
        Route::get('church-orders', Orders::class)->name('churches.orders');
        Route::get('church-payments', Payments::class)->name('churches.payments');


    });

    //** ROUTE COMUNICATIONs */
        Route::get('only-posts')->name('churches.courses');
        Route::get('comuninications')->name('churches.courses');
        Route::get('private-messages')->name('churches.courses');
        Route::get('church-chats')->name('churches.courses');

        Route::get('/profile', ProfileShow::class)->name('profile.show');
        });

        // Rotas de 2FA (não requerem 2FA completo, mas requerem email verificado)
        Route::get('/user/two-factor-authentication', TwoFactorPage::class)->name('two-factor.show');


    });
});


