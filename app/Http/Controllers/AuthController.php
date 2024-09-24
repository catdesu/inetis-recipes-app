<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginPostRequest;
use App\Http\Requests\RegisterPostRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Contracts\View\View;
use \Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    /**
     * Show register page
     *
     * @return View|Factory
     */
    public function register(): View|Factory {
        return view('auth.register');
    }

    /**
     * Register user and redirects on login page
     *
     * @return RedirectResponse
     */
    public function registerPost(RegisterPostRequest $request): RedirectResponse {
        $validated = $request->validated();

        $user = new User();

        $user->name = $validated['username'];
        $user->email = $validated['email'];
        $user->password = $validated['password'];

        $user->save();

        return redirect('/login')->with('success', 'Registered successfully');
    }

    /**
     * Show login page
     *
     * @return View|Factory
     */
    public function login(): View|Factory {
        return view('auth.login');
    }

    /**
     * Login user and redirects to recipes page
     *
     * @return RedirectResponse
     */
    public function loginPost(LoginPostRequest $request) {
        $validated = $request->validated();

        if (Auth::attempt($validated)) {
            return redirect('/recipes')->with('success', 'Logged in successfully');
        }

        return back()->with('error', 'Incorrect email or password.');
    }

    /**
     * Logout user's session
     *
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse {
        Auth::logout();

        return redirect()->route('login');
    }
}
