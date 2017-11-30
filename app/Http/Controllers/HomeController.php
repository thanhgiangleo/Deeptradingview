<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;

use App\User;
use Carbon\Carbon;
class HomeController extends Controller
{
    public function __construct(Socialite $socialite)
    {
        $this->socialite = $socialite;
//        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('login');
    }

    public function redirectToProvider()
    {

    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function facebook(Request $request)
    {
        if (!$request->has('code')) {
            return Socialite::driver('facebook')->redirect();
        }

        $user = Socialite::driver('facebook')->stateless()->user();

        $email = $user->email;
        $password = $user->token;

        if($this->isExistEmail($email))
        {
            $user = $this->getUserByEmail($email);
            echo "dang nhap thanh cong";
        }
        else
        {
            $this->insertUser($email, $password);
            echo "dang ki thanh cong";
        }
    }

    public function login()
    {
        return view('login');
    }

    public function loginAction(Request $request)
    {
        if ($request->input('cfpasswordRegister') !== null)
        {
            $this->registerAction($request);
            echo "dang ki thanh cong";
        }
        else
        {
            $email = $request->input('emailLogin');
            $password = $request->input('passwordLogin');

            $user = User::where([
            ['email', '=', $email],
            ['password', '=', md5($password)],])->first();

            if(isset($user))
                echo "dang nhap thanh cong";
        }
    }

    public function registerAction(Request $request)
    {
        $email = $request->input('emailRegister');
        $password = $request->input('passwordRegister');
        $this->insertUser($email, $password);
    }

    public function payment()
    {
        return view('payment');
    }

    public function isExistEmail($email)
    {
        $user = $this->getUserByEmail($email);
        return isset($user) ? true : false;
    }

    function get_client_ip() {
        $ipaddress = '';
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    function insertUser($email, $password)
    {
        $user = new User();

        $user->email = $email;
        $user->password = $password;
        $user->login_ip = $this->get_client_ip();
        $user->created_at = Carbon::now();
        $user->updated_at = Carbon::now();
        $user->expired_date = Carbon::now()->addDays(7);

        $user->save();
    }

    function getUserByEmail($email)
    {
        return User::where('email', '=', $email)->first();
    }
}
