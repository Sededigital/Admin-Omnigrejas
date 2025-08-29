<?php

use App\DTOs\ApiUser;

if (! function_exists('apiUser')) {
    function apiUser(): ?ApiUser
    {
        $user = session('user');

        if (is_array($user)) {
            return new ApiUser($user); // converte array para objeto
        }

        return null; // caso não exista
    }
}
