<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Order;
use App\User;
use App\UserFilter;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
  

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

    public function PhotographList(UserFilter $filters)
    {

        //$user = User::whereHas('roles', 'photographer')->paginate(3);
        $user = User::role('photographer')->filter($filters)->paginate(3);
   //$user = User::all()->filter($filters)->paginate(3);
   $user->load('avatar');
   $user->load('userprofile');
   $user->load('photos');
   $user->load('reviews');
    return response()->json($user);
    }


}
