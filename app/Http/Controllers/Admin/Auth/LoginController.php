<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\Auth\LoginRequest;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    {
        return view('admin.auth.login');
    }

    public function login(LoginRequest $request)
    {
        if (
            !Auth::guard('admin')
                ->attempt(['email' => $request->email, 'password' => $request->password], $request->has('remember_me'))
        ) {
            throw ValidationException::withMessages([
                'email' => [__('validation.wrong_credentials')],
            ]);
        }

        $request->session()->regenerate();

        return to_route('admin.home');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return to_route('admin.login.index');
    }
}