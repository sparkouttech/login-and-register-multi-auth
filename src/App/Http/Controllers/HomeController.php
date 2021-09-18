<?php

namespace Sparkouttech\UserMultiAuth\App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {

    }

    public function dashboard(Request $request)
    {
        return view('user-auth::dashboard');

    }

}
