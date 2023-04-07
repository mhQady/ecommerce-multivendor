<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class SetLocale
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Session::has('locale'))
            Session::put('locale', App::getLocale());

        $locale = Auth::guard('admin')->user()->locale ?? Session::get('locale');

        App::setLocale($locale);

        if ($locale == 'ar') {
            session(['dir' => 'rtl']);
        } else {
            session(['dir' => 'ltr']);
        }

        return $next($request);
    }
}