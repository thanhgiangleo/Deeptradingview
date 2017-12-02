<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    //    private $db;
    public function __construct(Socialite $socialite)
    {
        $this->socialite = $socialite;
        parent::__construct();
    }

    public function index()
    {        
        return view('admin/index');
    }
}