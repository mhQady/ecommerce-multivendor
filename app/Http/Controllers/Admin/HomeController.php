<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke(): \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    {
        return view('admin.index');
    }
}