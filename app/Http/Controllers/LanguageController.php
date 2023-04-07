<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function __invoke(Request $request)
    {
        $locale = $request->lang;

        if (!in_array($locale, ['en', 'ar']))
            abort(404);

        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->user()->update(['locale' => $locale]);
        }

        Session::put('locale', $locale);

        return back();
    }
}