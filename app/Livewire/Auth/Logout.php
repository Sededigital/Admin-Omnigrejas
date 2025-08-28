<?php
namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Log;
use App\Services\Api\V1\AuthService;

class Logout extends Component
{
    public function logout(AuthService $authService)
    {
        try {
            if (session()->has('api_token')) {
                $authService->logout(session('api_token'));
            }
        } catch (\Exception $e) {
            Log::error('Erro ao logout', ['exception' => $e]);
        }

            // Limpa sessão local
            session()->forget(['api_token', 'user']);
            session()->invalidate();
            session()->regenerateToken();

        // Use redirect() direto, não return redirect()
        $this->redirect(route('login'), navigate: true);
    }

    public function render()
    {
        return view('system.auth.logout');
    }
}
