<?php

namespace App\Http\Controllers\Vendor;

use App\Models\Country;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('vendor.index');
    }
}