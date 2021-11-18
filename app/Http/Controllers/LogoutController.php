<?php

namespace App\Http\Controllers;

use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    /**
     * Proses Autentikasi Logout
     * 
     * @return view('auth.login');
     */
    public function __invoke()
    {
        Auth::logout();
        return redirect(RouteServiceProvider::HOME);
    }
}
