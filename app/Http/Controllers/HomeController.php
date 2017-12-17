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
    private $email;
    private $user;
    public function __construct(Socialite $socialite)
    {
        $this->socialite = $socialite;
        parent::__construct();

        $this->email = $this->getEmail();
        if(!isset($this->email))
        {
            return redirect('/login');
        }
        $this->user = $this->getUserByEmail($this->email);
    }

    public function index()
    {

        $user = $this->insertUser("giang dieng", "sdsad");

        var_dump("Dw");
        die();
        var_dump($user);
        die();
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

    public function home()
    {
        return view('index');
    }

    public function payment()
    {
        return view('payment');
    }

    public function upgrade()
    {
        return view('upgrade', [ 'user' => $this->user ]);
    }

    public function userProfile()
    {
        return view('user-profile', [ 'user' => $this->user ]);
    }

    public function getUserType($email)
    {
        return DB::table($this->Users)->select('type')
            ->where('email', '=', $email)->first();
    }

    public function updateUser($array)
    {
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
