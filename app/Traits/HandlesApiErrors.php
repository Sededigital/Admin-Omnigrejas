<?php

namespace App\Traits;

use Livewire\Component;

trait HandlesApiErrors
{
    /**
     * Trata a resposta de erro da API e adiciona no Livewire
     *
     * @param array $body JSON decodificado da API
     * @param Component $component Componente Livewire
     */
    public function handleApiError(array $body, Component $component)
    {
        // 1️⃣ Erros de validação por campo
        if (!empty($body['errors'])) {
            foreach ($body['errors'] as $field => $messages) {
                if (in_array($field, ['email', 'password'])) {
                    foreach ($messages as $message) {
                        $component->addError($field, $message);
                    }
                } else {
                    foreach ($messages as $message) {
                        session()->flash('login_error', $message);
                    }
                }
            }
        }
        // 2️⃣ Mensagem única da API
        elseif (!empty($body['message'])) {
            $message = $body['message'];
            if (str_contains(strtolower($message), 'email')) {
                $component->addError('email', $message);
            } elseif (str_contains(strtolower($message), 'senha') || str_contains(strtolower($message), 'palavra-passe')) {
                $component->addError('password', $message);
            } else {
                session()->flash('login_error', $message);
            }
        }
        // 3️⃣ Fallback genérico
        else {
            session()->flash('login_error', 'Ocorreu um erro inesperado. Tente novamente.');
        }
    }
}
