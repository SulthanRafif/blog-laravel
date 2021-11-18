<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * Menampilkan Form untuk Login 
     * 
     * @return view('auth.login');
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Proses Autentikasi Login
     * 
     * @var attributes
     * 
     * @return redirect('/dashboard')->with('success', 'Anda Berhasil Login Sebagai User');
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if (Auth::attempt($attributes)) {

            if(Auth::user()->hasRole('admin')){
                return redirect('/dashboard')->with('success', 'Anda Berhasil Login Sebagai Admin');
            }

            return redirect('/dashboard')->with('success', 'Anda Berhasil Login Sebagai User');
        }

        throw ValidationException::withMessages([
            'email' => 'Your provide credentials does not match our records'
        ]);
    }
}
