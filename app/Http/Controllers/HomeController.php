<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __construct()
    {
//        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return "WDqwq";
    }
}
