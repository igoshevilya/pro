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
use App\Service;
use App\Gallery;
use App\OrderFilter;
class PhotographController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

     public function index()
    {
        $orders = Order::orderBy('id', 'desc')->paginate(10);
        return view('photographer.cabinet.myorders.index', compact('orders'));
    }

    public function myresponses()
    {
        $orders = Response::where('user_id', '=', Auth::id())->where('status', '=', Null)->orderBy('id', 'desc')->paginate(10);
        return view('photographer.cabinet.myorders.myresponses', compact('orders'));
    }

    public function execution()
    {
        $orders = Response::where('user_id', '=', Auth::id())->where('status', '=', 1)->orderBy('id', 'desc')->paginate(10);
        return view('photographer.cabinet.myorders.execution', compact('orders'));
    }

    public function history()
    {
        $orders = Response::where('user_id', '=', Auth::id())->where('status', '=', 2)->orderBy('id', 'desc')->paginate(10);
        return view('photographer.cabinet.myorders.history', compact('orders'));
    }
    
    public function show($id)
    {
        $order = Order::find($id);
        $responses = $order->responses()->orderBy('id', 'desc')->paginate(3);
        return view('photographer.cabinet.myorders.show', compact('order', 'responses'));
    }

    public function order()
    {
        $category = Category::all();
        $orders = Order::orderBy('id', 'desc')->paginate(10);
        return view('photographer.cabinet.order.index', compact('orders','category'));
    }

    public function showorder($id)
    {
        $order = Order::find($id);
        $responses = $order->responses()->where('user_id', '=', Auth::id())->first();
        return view('photographer.cabinet.order.show', compact('order', 'responses') );
    }
   
    public function orderlist( OrderFilter $filters)
    {
        $order = Order::with('client')->where('status', '=', null)->filter($filters)->latest()->paginate(10);
        $order->load('avatar');
        $order->load('category');
        return response()->json($order);
    }

      public function service()
    {
        return view('photographer.cabinet.myprofile.service.index');
    }
    public function storeservice(Request $request)
    {

        $request->validate([
            'description' => 'nullable|date',
        ]);
        $service = new Service();
        $service->user_id = Auth::id();
        $service->title = $request->service['title'];
        if (!empty($request->service['description'])) {
        $service->description = $request->service['description'];}
        $service->price = $request->service['price'];
        $service->photo = $request->service['photo'];
        $service->save();
    }
    public function getservice()
    {
        $user = Auth::user();
        $service = Service::where('user_id', $user->id)->get();
        return $service;
    }
    public function updateservice(Request $request, $id)
    {
        $service = Service::find($id);
        $service->title = $request->service['title'];
        $service->description = $request->service['description'];
        $service->price = $request->service['price'];
        $service->photo = $request->service['photo'];
        $service->save();
        return $service;
    }
    public function destroyservice($id)
    {
        $service = Service::find($id);
        $service->delete();
    }
    
}
