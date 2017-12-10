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

    public function dashboard()
    {        
        return view('admin.dashboard');
    }

    public function user()
    {
        return view('admin.user');
    }

    public function userList(Request $request)
    {
        $page = ($request->input('page') === null) ? "1" : $request->input('page');
        $indexPaging = ($request->input('indexPaging') === null) ? "1" : $request->input('indexPaging');

        $paginate = 10;
        $totalPage = $this->getTotalPage($paginate);

        $users = $this->getUsersPaging($page * $paginate + pow($paginate, (int)$indexPaging - 1) - 1, $paginate);

        return view('admin.userList', [
            'users' => $users,
            'indexPaging' => $indexPaging,
            'totalPage' => $totalPage
        ]);
    }

    public function typography()
    {
        return view('admin.typography');
    }

    public function icons()
    {
        return view('admin.icons');
    }

    public function maps()
    {
        return view('admin.maps');
    }

    public function notifications()
    {
        return view('admin.notifications');
    }

    public function getAllUsers()
    {
        return DB::table($this->Users)->get();
    }

    public function getUsersPaging($start, $paging)
    {
        return DB::table($this->Users)->skip($start)->take($paging)->get();
    }

    public function getTotalPage($paging)
    {
        return (int)(DB::table($this->Users)->count() / $paging + 1);
    }
}