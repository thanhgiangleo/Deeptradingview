<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

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

    public function setSession($user_type)
    {
        $_SESSION['deeptradingview_userType'] = $user_type;
    }

    public function isAdminLogin()
    {
        return $_SESSION['deeptradingview_userType'] === 4 ? true : false;
    }
}

