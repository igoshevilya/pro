<?php

namespace App\Http\Controllers;

use Auth;
use App\Portfolio;
use App\User;
use Illuminate\Http\Request;

class PhProfileController extends Controller
{
    public function show()
    {
        return view('photographer.cabinet.myprofile.portfolio');
    }

    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $imageName = time().'.'.$request->image->extension();  
   
        $request->image->move(public_path('images'), $imageName);
   
       /*  return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName); */
   
    $portfolio = new Portfolio;
    $portfolio->user_id = Auth::id();
    $portfolio->url =$file;
    dd($imageName);
    //$portfolio->save();

        
        // $response = new Response;
        // $response->user_id = Auth::id();
        // $response->description = $request->input('description');
        // $response->order_id = $id;
        // $response->save();
        // return redirect()->back()->with('success', 'Спасибо за отклик!');
    }
}
