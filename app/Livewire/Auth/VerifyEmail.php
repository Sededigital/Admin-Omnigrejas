<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\EmailVerificationRequest;


#[Title('Verificar E-mail')]
#[Layout('components.layouts.auth.guest')]
class VerifyEmail extends Component
{
    public function mount()
    {
        // Se o email já está verificado, redirecionar
        if (Auth::check() && Auth::user()->hasVerifiedEmail()) {

            return redirect()->route('dashboard.administrative');

        }
    }

    public function resend()
    {
        if (Auth::check() && Auth::user()->hasVerifiedEmail()) {
            return redirect()->route('dashboard.administrative');
        }

        Auth::user()->sendEmailVerificationNotification();

        session()->flash('status', 'verification-link-sent');
    }

    public function render()
    {
        return view('auth.verify-email');
    }
}
