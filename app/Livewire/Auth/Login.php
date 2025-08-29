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

     protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];


    // Renomeado de session() para login()
    public function login()
    {
        $this->validate();


        $this->validate();

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {

            session()->regenerate();

            $role = Auth::user()->role;

            switch ($role) {
                case 'super_admin':
                    redirect()->intended(route('dashboard.administrative'));

                case 'admin':
                    redirect()->intended(route('dashboard.church'));

                case 'pastor':
                    redirect()->intended(route('dashboard.church'));

                case 'ministro':
                    redirect()->intended(route('dashboard.church'));

                case 'root':
                    redirect()->intended(route('dashboard.root'));
            }
        }

        throw ValidationException::withMessages([
            'email' => ['As credenciais fornecidas não correspondem aos nossos registros.'],
        ]);

    }

    public function render()
    {
            // User::create([
            //     'name'=>'Lésio root',
            //     'email'=>'root@gmail.com',
            //     'password'=>Hash::make('200619'),
            //     'role'=>'root'
            // ]);

            // User::create([
            //     'name'=>'Adão Root',
            //     'email'=>'adao_root@gmail.com',
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
