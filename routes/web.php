<?php


//** OTHER COMPONENTS */
use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\ConfirmPassword;
use App\Livewire\Auth\TwoFactorChallenge;
use App\Livewire\Profile\Show as ProfileShow;
use App\Livewire\Profile\TwoFactorPage;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

//** LOGIN USER */
use App\Livewire\Auth\Login;
use Illuminate\Http\Request;
use App\Livewire\Users\Users;
use App\Livewire\Auth\VerifyEmail;
use App\Livewire\Auth\ResetPassword;
use Illuminate\Auth\Events\Verified;


//** USERS */
use App\Livewire\Auth\ForgotPassword;

//** ADMIN COMPONENTS */
use App\Livewire\Admin\Dashboard as AdminDashboard;
use App\Livewire\Super\Dashboard;
use App\Livewire\Root\Dashboard as RootDashboard;

//** BILLINGS COMPONENTS */
use App\Livewire\Billings\Logs;
use App\Livewire\Billings\Cupons;
use App\Livewire\Billings\Notificacoes;
use App\Livewire\Billings\IgrejasAssinadas;
use App\Livewire\Billings\AssinaturasAtuais;
use App\Livewire\Billings\AssinaturasHistorico;
use App\Livewire\Billings\Calendar as BillingsCalendar;
use App\Livewire\Billings\Modulos;
use App\Livewire\Billings\PacotePermissoes;
use App\Livewire\Billings\Pacotes;
use App\Livewire\Billings\Pagamentos;

//** START CHURCHES COMPONENTS */
use App\Livewire\Church\Courses\Courses;
use App\Livewire\Church\Courses\CourseRegistered;
use App\Livewire\Church\Courses\ProgressReport;
use App\Livewire\Church\Events\Calendar;
use App\Livewire\Church\Events\Events;
use App\Livewire\Church\Events\Scale;
use App\Livewire\Church\Events\Schedules;
use App\Livewire\Church\Events\StandardCult;
use App\Livewire\Church\Fincance\FinancialMoviment;
use App\Livewire\Church\Fincance\FinancialReport;
use App\Livewire\Church\Fincance\OnlineDonations;
use App\Livewire\Church\Marketplace\Orders;
use App\Livewire\Church\Marketplace\Payments;
use App\Livewire\Church\Marketplace\Products;
use App\Livewire\Church\Members\Members;
use App\Livewire\Church\Members\TalentMap;
use App\Livewire\Church\Members\Volunteers;
use App\Livewire\Church\Ministries\Ministries;
use App\Livewire\Church\Only\AdminChurch;
use App\Livewire\Church\Only\BibleReading;
use App\Livewire\Church\Only\ChuchGoodPractices;
use App\Livewire\Church\Only\OnlyChurches;
use App\Livewire\Church\Only\PastoralCare;
use App\Livewire\Church\Settings\Resources;
//** END CHURCHES COMPONENTS */




Route::get('/', function () {
    return Auth::check()
        ? redirect()->route(Auth::user()->redirectDashboardRoute())
        : redirect('login');
});


//** PUBLIC ROUTES */

Route::get('/login', Login::class)->name('login')->middleware('guest');
//** */ Route::get('/register', Register::class)->name('register');
Route::get('/forgot-password', ForgotPassword::class)->name('password.request');
Route::get('/reset-password/{token}', ResetPassword::class)->name('password.reset');
Route::get('/verify-email', VerifyEmail::class)->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', function (Request $request) {
    $user = User::find($request->route('id'));

    if (!$user) {
        #=> USER NOT FOUND → redireciona pro login
        return redirect()->route('login')->with('error', 'Usuário inválido.');
    }

    if (!hash_equals((string) $request->route('hash'), sha1($user->getEmailForVerification()))) {
        # => hash inválida → redireciona pro login
        return redirect()->route('login')->with('login_error', 'Link de verificação inválido.');
    }
    // loga o user
    Auth::login($user, true);

    if (! $user->hasVerifiedEmail() && $user->markEmailAsVerified()) {
        event(new Verified($user));
    }

    return redirect()->route($user->redirectDashboardRoute())
        ->with('status', 'Email verificado com sucesso!');
})->middleware(['signed'])->name('verification.verify');



Route::get('/confirm-password', ConfirmPassword::class)->name('password.confirm');

// Rota de desafio 2FA (acessível sem autenticação completa)
Route::get('/two-factor-challenge', TwoFactorChallenge::class)->name('two-factor.login');

//**AUTHORIZE ROUTES**/
Route::middleware(['auth'])->group(function () {
    // Rotas que requerem email verificado
    Route::middleware(['verified'])->group(function () {

        Route::get('/profile', ProfileShow::class)->name('profile.show');

        // Rotas que requerem 2FA completo
        Route::middleware(['2fa'])->group(function () {

    # => Route for Admin Or Root
        Route::get('dashboard-administrative', Dashboard::class)->name('dashboard.administrative')->middleware(['isSuperAdmin']);
        Route::get('dashboard-church', AdminDashboard::class)->name('dashboard-admin.church')->middleware(['isAdminIgreja']);
        Route::get('dashboard-root', RootDashboard::class)->name('dashboard.root')->middleware(['isRoot']);
        Route::get('geral/list-users', Users::class)->name('users.lisusers')->middleware(['isSuperAdmin']);

        });

        //** ROUTE COMUNICATIONs */
        // Rotas removidas - não possuem controladores implementados


        //** */ Rotas de 2FA (não requerem 2FA completo, mas requerem email verificado)
        Route::get('/user/two-factor-authentication', TwoFactorPage::class)->name('two-factor.show');

        //** BILLINGS ROUTES OF ASSIGANTURES */
        Route::middleware(['isSuperAdmin'])->group(function(){

        Route::prefix('admin/assignatures')->name('admin.assignatures.')->group(function(){
            Route::get('pacotes', Pacotes::class)->name('pacotes');
            Route::get('assinaturas-atuais', AssinaturasAtuais::class)->name('assinaturas-atuais');
            Route::get('assinaturas-historico', AssinaturasHistorico::class)->name('assinaturas-historico');
            Route::get('modulos', Modulos::class)->name('modulos');
            Route::get('pacote-permissoes', PacotePermissoes::class)->name('pacote-permissoes');
            Route::get('pagamentos/{assinatura_id?}', Pagamentos::class)->name('pagamentos');
            Route::get('igrejas-assinadas', IgrejasAssinadas::class)->name('igrejas-assinadas');
            Route::get('logs', Logs::class)->name('logs');
            Route::get('cupons', Cupons::class)->name('cupons');
            Route::get('notifications', Notificacoes::class)->name('notifications');
            Route::get('calendar', BillingsCalendar::class)->name('calendar');
        });


        Route::prefix('admin')->name('admin.')->group(function(){
            Route::get('/church', AdminChurch::class)->name('church');
        });

        });


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

    });

});


