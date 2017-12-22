<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Carbon\Carbon;

class HomeController extends Controller
{
    private $socialite;
    private $email;
    private $user;
    public function __construct(Socialite $socialite)
    {
        $this->socialite = $socialite;
        parent::__construct();
    }

    public function valid()
    {
        $this->email = $this->getEmail();

        if(!isset($this->email))
        {
            return false;
        }

        $this->user = $this->getUserByEmail($this->email);
        return true;
    }

    public function index()
    {
        if(!$this->valid())
            return redirect('login');

        return view('index');
    }

    public function coinView()
    {
        if(!$this->valid())
            return redirect('login');

        return view('coin-view');
    }

    public function payment()
    {
        if(!$this->valid())
            return redirect('login');

        return view('payment');
    }

    public function upgrade()
    {
        if(!$this->valid())
            return redirect('login');

        return view('upgrade', [ 'user' => $this->user ]);
    }

    public function userProfile()
    {
        if(!$this->valid())
            return redirect('login');

        return view('user-profile', [ 'user' => $this->user ]);
    }

    public function updateUser($array)
    {
        if(!$this->valid())
            return redirect('login');

        DB::table('users')->insert([
            'email' => 'john@example.com',
            'password' => '',
            'payment_code' => '',
            'reffered_code' => '',
            'expired_at' => '',
            'login_ip' => '',
            'status' => ''
        ]);
    }
}
