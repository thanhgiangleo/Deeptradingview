<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $Users;
    protected $User_Type;
    protected $User_Upgrade;
    public function __construct()
    {
        session_start();
        $this->Users = "users.user";
        $this->User_Type = "users.user_type";
        $this->User_Upgrade = "users.user_upgrade";
    }

    public function setSession($user_Info)
    {
        $_SESSION['deeptradingview_userType'] = $user_Info['user_type'];
        $_SESSION['deeptradingview_email'] = $user_Info['email'];
    }

    public function unSetSession()
    {
        $_SESSION['deeptradingview_userType'] = null;
        $_SESSION['deeptradingview_email'] = null;
    }

    public function isAdminLogin()
    {
        return $_SESSION['deeptradingview_userType']->type === 4 ? true : false;
    }

    public function getEmail()
    {
        if(isset($_SESSION['deeptradingview_email']))
            return $_SESSION['deeptradingview_email'];

        return null;
    }

    public function getUserByEmail($email)
    {
        return DB::table($this->Users)
            ->where('email', '=', $email)->first();
    }

    public function getUserType($email)
    {
        return DB::table($this->Users)->select('type')
            ->where('email', '=', $email)->first();
    }
}

