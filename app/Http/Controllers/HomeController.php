<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;

use App\User;
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
        var_dump($user);
        die();
    }

    public function login()
    {
        $posts = User::all();
        var_dump($posts); die();
        return view('loginv2');
    }

    public function loginAction(Request $request)
    {
        if ($request->input('cfpassword') !== null)
        {
            $this->registerAction($request);
        }
        else
        {
            $email = $request->input('email');
            $password = $request->input('password');
        }
    }

    public function registerAction(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');


    }

    public function payment()
    {
        return view('payment');
    }
}
