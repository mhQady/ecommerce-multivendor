<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function __invoke()
    {
        // dd(Session::get('locale'), App::getLocale());

        // return session()->all();
        return view('admin.index');
    }
}