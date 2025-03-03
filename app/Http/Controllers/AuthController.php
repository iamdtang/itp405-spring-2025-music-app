<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function logout()
    {
        Auth::logout();

        return redirect()->route('auth.loginForm');
    }

    public function loginForm()
    {
        return view('auth.login');
    }
}
