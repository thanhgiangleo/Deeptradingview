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
//    private $db;
    public function __construct(Socialite $socialite)
    {
        $this->socialite = $socialite;
        parent::__construct();
    }

    public function index()
    {

        $user = $this->insertUser("giang dieng", "sdsad");

        var_dump("Dw"); die();
        var_dump($user); die();
//        if (!$this->db) {
//            echo "ERROR : CANNOT OPEN DB\n";
//        }
//        else {
//            $result = pg_query($this->db, "SELECT * from users.user_type");
//            if (!$result) {
//                echo "An error occurred.\n";
//                exit;
//            }
//
//            while ($row = pg_fetch_row($result)) {
//                echo "Type: $row[0]  Name: $row[1]";
//                echo "<br />\n";
//            }
//        }
//        return view('login');
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

    public function loginAction($email, $password)
    {
        $user = DB::table($this->Users)
            ->where([
            ['email', '=', $email],
            ['password', '=', md5($password)],])->first();

        return isset($user) ? 1 : 0;
    }

    public function registerAction($email, $password)
    {
        $this->insertUser($email, md5($password));
        return $this->loginAction($email, $password);
    }

    public function payment()
    {
        return view('payment');
    }

    public function isExistEmail($email)
    {
        $user = $this->getUserByEmail($email);
        return isset($user) ? 1 : 0;
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
        $login_ip = $this->get_client_ip();
        $created_at = Carbon::now();
        $expired_at = Carbon::now()->addDays(7);
        DB::table($this->Users)->insert(
            [
                'email' => $email,
                'password' => $password,
                'login_ip' => $login_ip,
                'created_at' => $created_at,
                'expired_at' => $expired_at
            ]
        );
    }

    function getUserByEmail($email)
    {
        return DB::table($this->Users)
            ->where('email', '=', $email)->first();
    }
}
