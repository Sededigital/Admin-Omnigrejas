<?php
namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;



#[Title('Iniciar sessão')]
#[Layout('components.layouts.auth.guest')]
class Login extends Component
{


    public $email;
    public $password;
    public $remember = false;
    public $loading = false;
    public $loginSuccessful = false;

     protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];


    // Renomeado de session() para login()
    public function login()
    {
        $this->loading = true;
        $this->validate();

        // Verificar se o usuário existe
        $user = User::where('email', $this->email)->first();

        if (!$user) {
            // Email não encontrado
            $this->loading = false;
            throw ValidationException::withMessages([
                'email' => ['Este email não está registrado em nosso sistema.'],
            ]);
        }

        // Verificar se a senha está correta
        if (!Hash::check($this->password, $user->password)) {
            // Senha incorreta
            $this->loading = false;
            throw ValidationException::withMessages([
                'password' => ['A senha fornecida está incorreta.'],
            ]);
        }

        // Verificar se o usuário está ativo
        if (!$user->is_active) {
            // Usuário inativo
            $this->loading = false;
            throw ValidationException::withMessages([
                'email' => ['Sua conta está desativada. Entre em contato com o administrador.'],
            ]);
        }

        // Tentativa de login bem-sucedida
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {

            session()->regenerate();

            // Marcar login como bem-sucedido para manter botão desabilitado
            $this->loginSuccessful = true;

            $role = Auth::user()->role;

            switch ($role) {
                case 'super_admin':
                    return redirect()->intended(route('dashboard.administrative'));
                  break;
                case 'admin':
                    return redirect()->intended(route('dashboard-admin.church'));
                    break;
                case 'pastor':
                    return redirect()->intended(route('dashboard-admin.church'));
                    break;
                case 'ministro':
                    return redirect()->intended(route('dashboard-admin.church'));
                    break;
                case 'root':
                    return redirect()->intended(route('dashboard.root'));
                default:
                    // Caso o role não seja reconhecido, redirecionar para login
                    Auth::logout();
                    $this->loading = false;
                    throw ValidationException::withMessages([
                        'email' => ['Tipo de usuário não autorizado.'],
                    ]);
            }
        } else {
            // Erro genérico (fallback)
            $this->loading = false;
            throw ValidationException::withMessages([
                'email' => ['Erro ao fazer login. Tente novamente.'],
            ]);
        }
    }
    public function render()
    {
            // User::create([
            //     'name'=>'Lésio root',
            //     'email'=>'luiskediambiko@gmail.com',
            //     'password'=>Hash::make('200619'),
            //     'role'=>'root'
            // ]);

            // User::create([
            //     'name'=>'Adão Root',
            //     'email'=>'adaomagalhaes793@gmail.com',
            //     'password'=>Hash::make('adao2025'),
            //     'role'=>'root'
            // ]);

            // User::create([
            //     'name'=>'Seniamara Admin',
            //     'email'=>'seniamara@gmail.com',
            //     'password'=>Hash::make('seniamara2025'),
            //     'role'=>'admin'
            // ]);



        return view('auth.login');
    }
}
