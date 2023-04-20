<?php

namespace App\Http\Controllers\Vendor\Auth;

use App\Models\Vendor;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Vendor\Auth\RegisterRequest;

class RegisterController extends Controller
{
    public function index()
    {
        return view('vendor.auth.register');
    }

    public function register(RegisterRequest $request)
    {
        $user = Vendor::create($request->validated());

        Auth::guard('vendor')->login($user);

        return to_route('vendor.home');
    }
}