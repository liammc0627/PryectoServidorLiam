<?php

namespace App\Http\Controllers;

use App\Models\Login;
use App\Http\Requests\SignupRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function signUpForm(): View
    {
        return view('auth.signUp');
    }

    public function signUp(SignupRequest $request): RedirectResponse
    {
        $user = new User();
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = Hash::make($request->get('password'));
        $user->save();

        Auth::login($user);

        return redirect()->route('inicio');
    }
    public function loginForm(): View
    {
        if (Auth::viaRemember()) {
            return 'Bienvenido de nuevo, ' . Auth::user()->username . '!';
        }elseif (Auth::check()) {
            return redirect()->route('inicio');
        }else {
        return view('auth.login');
    }
    }
    public function login(Request $request): View|RedirectResponse
    {
        $credentials = $request->only('username', 'password');
        $remember = ($request->get('remember')) ? true : false;

        if (Auth::guard('web')->attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->route('inicio');
        } else {
            $error = 'Error al iniciar sesión.';
            return view('auth.login', compact('error'));
        }
    }
    public function logout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('loginForm');
    }
}
