<?php
namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\RateLimiter;



#[Title('Iniciar sessão')]
#[Layout('components.layouts.auth.guest')]
class Login extends Component
{


    public $email;
    public $password;
    public $remember = false;

    public function rules()
    {
        return [
            'email' => 'required|email',
            'password' => 'required|min:4',
        ];
    }

    // Renomeado de session() para login()
    public function login()
    {
        $this->validate();

        try {




            $this->validate();

            if (RateLimiter::tooManyAttempts('email:' . $this->email, 3)) {
                $seconds = RateLimiter::availableIn('email:' . $this->email);

                session()->flash('login_error', 'Muitas tentativas. Tente novamente em ' . $seconds . ' segundos.');
                // $this->dispatch('ShowAlert', [
                //     'type' => 'error',
                //     'title' => 'Acesso negado',
                //     'message' => 'Muitas tentativas. Tente novamente em ' . $seconds . ' segundos.',
                // ]);
                return;
            }


            $user = User::where('email', $this->email)->first();

            if (!$user) {
                RateLimiter::hit('email:' . $this->email);

                session()->flash('login_error', 'O email informado não está cadastrado.');
                // $this->dispatch('ShowAlert', [
                //     'type' => 'error',
                //     'title' => 'Usuário não encontrado',
                //     'message' => 'O email informado não está cadastrado.',
                // ]);
                return;
            }

            if (!Hash::check($this->password, $user->password)) {
                RateLimiter::hit('email:' . $this->email);

                session()->flash('login_error', 'A senha informada não confere. Tente novamente.');

                // $this->dispatch('ShowAlert', [
                //     'type' => 'error',
                //     'title' => 'Senha incorreta',
                //     'message' => 'A senha informada não confere. Tente novamente.',
                // ]);
                return;
            }


            Auth::login($user, $this->remember == true);


            $role = Auth::user()->role;

            switch ($role) {
                case 'super_admin':
                    return $this->redirect(route('dashboard-administrative'), navigate: true);

                case 'admin':
                    return $this->redirect(route('dashboard.church'), navigate: true);

                case 'pastor':
                    return $this->redirect(route('dashboard.church'), navigate: true);

                case 'ministro':
                    return $this->redirect(route('dashboard.church'), navigate: true);

                case 'root':
                    return $this->redirect(route('dashboard-administrative'), navigate: true);
            }

        } catch (\Illuminate\Http\Client\RequestException $e) {
            $body = $e->response->json() ?? [];
            $this->handleApiError($body, $this);
        } catch (\Exception $e) {
            session()->flash('login_error', 'Ocorreu um erro inesperado. Tente novamente.');
        }
    }

    public function render()
    {
        //  $register = User::create([
        //         'name'=>'Seniamara Admin',
        //         'email'=>'seniamara@gmail.com',
        //         'password'=>Hash::make('seniamara2025'),
        //         'role'=>'admin'
        //     ]);

        //     if ($register) {

        //         session()->flash('login_error', 'Registro feito com sucesso');
        //     }

        return view('system.auth.login');
    }
}
