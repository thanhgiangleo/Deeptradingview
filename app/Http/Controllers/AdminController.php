<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    private $email;
    public function __construct(Socialite $socialite)
    {
        parent::__construct();
    }

    public function valid()
    {
        $this->email = $this->getEmail();
        if(isset($this->email) && $this->isAdminLogin()) {
            return true;
        }

        return false;
    }

    public function dashboard()
    {
        if(!$this->valid())
            return redirect('/login');

        return view('admin.dashboard');
    }

    public function userUpgrade()
    {
        if(!$this->valid())
            return redirect('/login');

        $users = $this->getAllUsersUpgrade();
        return view('admin.user-upgrade', [ 'users' => $users ]);
    }

    public function userProfile($id)
    {
        if(!$this->valid())
            return redirect('/login');

        $user = $this->getUser($id);
        return view('admin.user-profile', [ 'user' => $user ]);
    }

    public function userList(Request $request)
    {
        if(!$this->valid())
            return redirect('/login');

        $page = ($request->input('page') === null) ? "1" : $request->input('page');
        $indexPaging = ($request->input('indexPaging') === null) ? "1" : $request->input('indexPaging');

        $paginate = 10;
        $totalPage = $this->getTotalPage($paginate);

        $users = $this->getUsersPaging($page * $paginate + pow($paginate, (int)$indexPaging - 1) - 1, $paginate);

        return view('admin.user-list', [
            'users' => $users,
            'indexPaging' => $indexPaging,
            'totalPage' => $totalPage
        ]);
    }

    public function typography()
    {
        if(!$this->valid())
            return redirect('/login');

        return view('admin.typography');
    }

    public function icons()
    {
        if(!$this->valid())
            return redirect('/login');

        return view('admin.icons');
    }

    public function maps()
    {
        if(!$this->valid())
            return redirect('/login');

        return view('admin.maps');
    }

    public function notifications()
    {
        if(!$this->valid())
            return redirect('/login');

        return view('admin.notifications');
    }

    public function getAllUsers()
    {
        if(!$this->valid())
            return redirect('/login');

        return DB::table($this->Users)->get();
    }

    public function getAllUsersUpgrade()
    {
        if(!$this->valid())
            return redirect('/login');

        return DB::table($this->User_Upgrade)->get();
    }

    public function getUsersPaging($start, $paging)
    {
        if(!$this->valid())
            return redirect('/login');

        return DB::table($this->Users)->skip($start)->take($paging)->get();
    }

    public function getTotalPage($paging)
    {
        if(!$this->valid())
            return redirect('/login');

        return (int)(DB::table($this->Users)->count() / $paging + 1);
    }

    public function getUser($id)
    {
        if(!$this->valid())
            return redirect('/login');

        return DB::table($this->Users)
            ->where('id', '=', $id)->first();
    }
}