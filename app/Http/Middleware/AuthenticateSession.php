<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticateSession
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            abort(403, 'Inicie sesion para acceder');
        }

        return $next($request);
    }
}
