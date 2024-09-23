<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register() {
        return view('auth.register');
    }

    public function registerPost(Request $request) {
        dd($request);
    }

    public function login() {
        return view('auth.login');
    }

    public function loginPost(Request $request) {
        dd($request);
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('login');
    }
}
