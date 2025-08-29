<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Str;
use App\Models\User;

class ResetPassword extends Component
{
    #[Rule('required|email')]
    public $email = '';

    #[Rule('required|min:8')]
    public $password = '';

    #[Rule('required|same:password')]
    public $password_confirmation = '';

    public $token = '';

    public function mount($token)
    {
        $this->token = $token;
    }

    public function resetPassword()
    {
        $this->validate();

        $status = Password::reset(
            [
                'email' => $this->email,
                'password' => $this->password,
                'password_confirmation' => $this->password_confirmation,
                'token' => $this->token,
            ],
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );

        if ($status === Password::PASSWORD_RESET) {
            session()->flash('status', 'Sua senha foi redefinida com sucesso!');
            return $this->redirect(route('login'));
        } else {
            $this->addError('email', __($status));
        }
    }

    public function render()
    {
        return view('auth.reset-password');
    }
}
