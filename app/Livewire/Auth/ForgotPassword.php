<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Mail\PasswordReset;

class ForgotPassword extends Component
{
    #[Rule('required|email')]
    public $email = '';

    public $emailSent = false;

    public function sendResetLink()
    {
        $this->validate();

        $user = User::where('email', $this->email)->first();

        if (!$user) {
            $this->addError('email', 'Não encontramos um usuário com este endereço de email.');
            return;
        }

        // Gerar token de reset
        $token = Password::createToken($user);

        // Enviar email
        Mail::to($user->email)->send(new PasswordReset($user, $token));

        $this->emailSent = true;
        session()->flash('status', 'Link de redefinição de senha enviado para seu email!');
    }

    public function render()
    {
        return view('auth.forgot-password');
    }
}
