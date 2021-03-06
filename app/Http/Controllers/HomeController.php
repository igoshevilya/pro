<?php

namespace App\Http\Controllers;
use Auth;
use App\Category;
use Illuminate\Http\Request;
use Notification;
use Illuminate\Notifications\Notifiable;
use App\Сategory;
use App\User;
use App\UserFilter;
use Mail;
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
        $category = Category::all();
        return view('client.catalog.index', compact('category'));
    }

    public function clear()
    {
        Auth::user()->unreadNotifications->markAsRead();
        return redirect()->back();
    }

    public function PhotographList(UserFilter $filters)
    {
        //$user = User::whereHas('roles', 'photographer')->paginate(3);
        $user = User::role('photographer')->filter($filters)->paginate(3);
       // $users=User::find(3);      
   //$user = User::all()->filter($filters)->paginate(3);
   $user->load('avatar');
   $user->load('userprofile');
   $user->load('photos');
   $user->load('reviews');   
    return response()->json($user);
    }

    
    

}
