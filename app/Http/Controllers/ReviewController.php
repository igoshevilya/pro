<?php

namespace App\Http\Controllers;
use Auth;
use App\Review;
use App\Order;
use App\Response;
use App\ClientReview;
use App\OrderCabinet;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('reviews.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //$order = Order::find($id);
       // $user = $ordercabinet-> photograph->getName();
//$client = $ordercabinet-> client->getName();
$review = Review::find(1);
$user = $review-> photograph->getName();
$client = $review-> client->getName();
//dd($user);
        return view('reviews.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $ordercabinet = OrderCabinet::find($id);
        $review = new Review;
        $review ->order_id = $ordercabinet-> id;
        $review -> photograph_id = $ordercabinet-> photograph_id;
        $review -> client_id = $ordercabinet-> client_id;
        $review -> text = $request->input('text');
        $review -> star = $request->input('rating');
        $review->save();
        $ordercabinet->status = 3;
        $ordercabinet->save();
        return redirect()->back()->with('success', 'Отзыв оставлен!');

        //dd($review);
                
    }

    public function storeclient(Request $request, $id)
    {
        $order = Order::find($id);
        $review = new ClientReview;
        $review -> order_id = $order-> id;
        $review -> photograph_id = Auth::id();
        $review -> client_id = $order-> user_id;
        $review -> text = $request->input('text');
        //  $review -> star = $request->input('rating');
        $review->save();

       // $ordercabinet->status = 3;
       // $ordercabinet->save();
        return redirect()->back()->with('info', 'Отзыв оставлен!');

        //dd($review);
                
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
