<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (!Auth::user()->is_admin) {
            return redirect('/login')->withErrors([
                'email' => 'Vous n’êtes pas autorisé à accéder.',
            ]);
        }

        return $next($request);
    }
}