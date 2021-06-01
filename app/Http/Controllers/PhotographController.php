<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\User;
use App\Order;
use App\Category;
use App\Response;
use App\OrderCabinet;

class PhotographController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->paginate('3');
        return view('photographer.cabinet.myorders.index', compact('orders'));
    }

    public function show($id)
    {
        $order = Order::find($id);
        $responses = $order->responses()->orderBy('id', 'desc')->paginate(3);
        return view('photographer.cabinet.myorders.show', compact('order', 'responses'));
    }

    public function order()
    {
        $orders = Order::orderBy('id', 'desc')->paginate('3');
        return view('photographer.cabinet.order.index', compact('orders'));
    }

    public function showorder($id)
    {
        $order = Order::find($id);
        $responses = $order->responses()->where('user_id', '=', Auth::id())->get();
        return view('photographer.cabinet.order.show', ['order' => $order]);
    }
   
    public function myresponses()
    {
        $orders = Response::where('user_id', '=', Auth::id())->where('status', '=', Null)->orderBy('id', 'desc')->paginate(3);
        return view('photographer.cabinet.myorders.myresponses', compact('orders'));
    }

    public function execution()
    {
        $orders = Response::where('user_id', '=', Auth::id())->where('status', '=', 1)->orderBy('id', 'desc')->paginate(3);
        return view('photographer.cabinet.myorders.execution', compact('orders'));
    }


    public function history()
    {
        $orders = Response::where('user_id', '=', Auth::id())->where('status', '=', 2)->orderBy('id', 'desc')->paginate(3);
        return view('photographer.cabinet.myorders.history', compact('orders'));
    }

    public function info()
    {
        return view('photographer.cabinet.myprofile.index');
    }
}
