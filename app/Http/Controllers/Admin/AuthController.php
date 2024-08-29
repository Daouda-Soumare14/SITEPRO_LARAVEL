<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function doLogin(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('admin.index'));
        }
        return to_route('auth.login')->withErrors([
            'email' => 'Email invalide'
        ])->onlyInput('email');
    }

    public function logout()
    {
        Auth::logout();

        return to_route('auth.login');
    }
}
