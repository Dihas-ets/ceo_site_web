<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/admin/dashboard';

    public function __construct()
    {

        $this->middleware('guest')->except('logout');
        
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->is_admin) {
            return redirect()->intended('/admin/dashboard');
        }

        Auth::logout();
        return redirect('/login')->withErrors([
            'email' => 'Vous n’êtes pas autorisé à accéder.',
        ]);
    }
}