<?php
namespace App\Livewire\Auth;

use Livewire\Component;
use App\Services\Api\V1\AuthService;
use App\Traits\HandlesApiErrors;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;

#[Title('Iniciar sessão')]
#[Layout('components.layouts.auth.guest')]
class Login extends Component
{
    use HandlesApiErrors;

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
    public function login(AuthService $authService)
    {
        $this->validate();

        try {
            
            $response = $authService->login($this->email, $this->password);

            if (!empty($response['access_token'])) {
                session([
                    'api_token' => $response['access_token'],
                    'user' => $response['user'] ?? null
                ]);


                $this->redirect(route('dashboard'), navigate: true);
            } else {
                session()->flash('login_error', 'Credenciais inválidas.');
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
        return view('system.auth.login');
    }
}
