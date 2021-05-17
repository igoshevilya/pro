<?php

namespace App\Http\Controllers;
use Auth;
use Carbon\Carbon;
use App\User;
use App\Order;
use App\Category;
use App\Response;
use App\OrderCabinet;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $orders = Order::orderBy('id', 'desc')->paginate('3');
 
        $responses = Response::all();
       
        return view('client.order.index', compact('categories','orders','responses')
    );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $orders = Order::all();

        return view('client.order.add',compact('categories','orders'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new Order;
        $order->user_id = Auth::id();
        $order->title = $request->input('title');
        $order->category_id = $request->input('category_id');
        $order->description = $request->input('description');
        $order->location = $request->input('location');
        $order->price = $request->input('price');
        $order->date = $request->input('date');
       /**  $order->status = $request->input('status');
          */




        $order->save();

        return redirect('myorder')->with('success', 'Задание успешно создано!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::all();
        $categories = Category::all();
        $order = Order::find($id);
        $responses = $order->responses()->orderBy('id', 'desc')->paginate(3);
        
        return view('client.order.show', compact('categories','order','responses','user'));
       
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function assigned($orderId, $responseId)
    {
        $order = Order::find($orderId);
        $order->status = 1;
        $order->save();
        $response = Response::find($responseId);
        $response->status = 1;
        $response->save();

        $ordercabinet = new OrderCabinet;
        $ordercabinet->order_id = $orderId;
        $ordercabinet->client_id =  $order->user_id;
        $ordercabinet->photograph_id = $response->user_id;
        $ordercabinet->status = 1;
        $ordercabinet->save();
    
        return redirect()->route('client.order.cabinet', ['id' => $ordercabinet->id])->with('success', 'Исполнитель выбран!');
    }

    public function cabinet($id)
    {
     
        $ordercabinet = OrderCabinet::find($id);
        $user = $ordercabinet-> photograph->getName();
        $client = $ordercabinet-> client->getName();
        
        
        return view('client.order.cabinet', compact('user','client','ordercabinet'));
      
    }

    public function taskcompleted($id)
    {
     
        $ordercabinet = OrderCabinet::find($id);
        $ordercabinet->status = 2;
        $ordercabinet->save();
        
        return back()->with('success', 'Задание подтверждено!');
      
    }
    

}
