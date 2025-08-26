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

    protected function authenticated($request, $user)
    {
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }
    
        if ($user->role === 'gestionnaire') {
            return redirect()->route('admin.dashboard'); // 👈 redirige aussi vers le dashboard admin
        }
    
        return redirect()->route('welcome');
    }
    

}