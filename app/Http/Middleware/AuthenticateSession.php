<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticateSession
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return response()->view('auth.unauthorized', [], 403);
        }

        return $next($request);
    }
}
