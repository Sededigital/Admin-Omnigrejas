<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ConfirmPassword extends Component
{
    public $password = '';

    protected $rules = [
        'password' => 'required',
    ];

    public function confirmPassword()
    {
        $this->validate();

        if (!Hash::check($this->password, \Illuminate\Support\Facades\Auth::user()->password)) {
            throw ValidationException::withMessages([
                'password' => ['A senha fornecida não está correta.'],
            ]);
        }

        session(['auth.password_confirmed_at' => time()]);

        return redirect()->intended(route('dashboard'));
    }

    public function render()
    {
        return view('auth.confirm-password');
    }
}
