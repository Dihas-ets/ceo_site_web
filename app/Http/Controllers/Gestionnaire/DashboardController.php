<?php

namespace App\Http\Controllers\Gestionnaire;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        return view('gestionnaire.dashboard'); // tu crées cette vue
    }
}
