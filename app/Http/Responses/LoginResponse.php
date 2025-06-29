<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        // Redirection selon le rôle
        if (auth()->user()->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        // Sinon vers le dashboard utilisateur normal
        return redirect()->route('dashboard');
    }
}
