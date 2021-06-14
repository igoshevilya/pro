<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderFilter;
use App\Order;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function catalog()
    {
        return view('client.catalog.index');
    }

    public function PhotographList( OrderFilter $filters)
    {

        //$user = User::whereHas('roles', 'photographer')->paginate(3);
   $user = User::role('photographer')->paginate(3);
   $user->load('avatar');
   $user->load('userprofile');
        return response()->json($user);
    }
}
