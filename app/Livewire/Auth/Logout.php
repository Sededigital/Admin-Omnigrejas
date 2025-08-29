<?php
namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Log;

class Logout extends Component
{
    public function logout()
    {
        try {

            Auth::logout();
            
        } catch (\Exception $e) {
            Log::error('Erro ao logout', ['exception' => $e]);
        }


        // Use redirect() direto, não return redirect()
        $this->redirect(route('login'), navigate: true);
    }

    public function render()
    {
        return view('system.auth.logout');
    }
}
