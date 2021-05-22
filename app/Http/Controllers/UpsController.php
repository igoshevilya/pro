<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Up;
use Auth;
use Illuminate\Http\Response;
use Image;
use File;
use App\User;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class UpsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $url_data = [
            array(
            'title' => 'DKA-DEVELOP', 
            'url'  => 'https://dka-develop.ru'
            ),
            array(
            'title' => 'YouTube', 
            'url' => 'http://youtube.com'
            )  ];
           // $url_data = Up::all()->jsonSerialize();
            //$image = $images ->id;
//dd($url_data);
            //dd(json_encode($url_data));
        return view('photographer.cabinet.myprofile.portfolio', [
            'url_data' => $url_data
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('up.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   
    public function store(Request $request)

    {
        if (count($request->images) > 0) {
            foreach ($request->images as $image) {
               
                $name =$image->getClientOriginalName();
                $name = time().'_'.$name;
              

                
               
                
                Image::make($image)->save(public_path('/images/').$name);
               
                $thumbnail= 'thumbnail_'.$name;
                
                Image::make($image)
                ->fit(300, 200)
                ->save(public_path('/thumbnail/').$thumbnail);
                

    $image= new Up();
    $image->images = $name;
    $image->thumbnail = $thumbnail;
    $image->user_id = Auth::id();
    $image->save();
            }
        }

        return response()->json([
            "Message" => "Done"
        ]);
      
    }

   /*  { 
        $this->validate($request, [
            'image' => 'required'
    ]);
    
    if($request->get('image'))
    {
        $image = $request->get('image');
        $name = time().'.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
        \Image::make($request->get('image'))->save(public_path('images/').$name);
    }

    $image= new Up();
    $image->images = $name;
    $image->thumbnail = $name;
    $image->user_id = Auth::id();

    $image->save();

    return response()->json(['success' => 'You have successfully uploaded an image'], 200); */
        /* $this->validate($request,[
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        if(Auth::user()->userprofile){
            $oldimage = Up::where('user_id', Auth::user()->id)->firstOrFail();
            File::delete([
                public_path($oldimage->image),
                public_path($oldimage->thumbnail),
            ]);
            $oldimage->delete();
        }
        
        $image = request()->file('image');
        $imageName = $image->getClientOriginalName();
        $imageName = time().'_'.$imageName;
        $thumbnail = $image->getClientOriginalName();
        $thumbnail= time().'_thumbnail'.$thumbnail;

        Image::make($image)
        ->fit(100, 100)
        ->save(public_path('/images/').$thumbnail);
        $image->move(public_path('/images'), $imageName);

        $img = new Up;
        $img->user_id = Auth::user()->id;
        $img->image = 'images/'.$imageName;
        $img->thumbnail = 'images/'.$thumbnail;
        $img->save(); */
      
       /* if($request->hasFile('files')){
           $pictures = [];
           foreach($request->file('files') as $file){
               $filename = $file->store('images');
               $file->move(public_path('images'), $filename);
               $pictures[]= $filename;
               
           }
         
           $img = new Images; 
           $img->user_id =  Auth::id();
           $img->images = json_encode($pictures);
           $img->save();
              
           dd($img);
           return response()->json(['message'=>'good']);
          
       } 
     
    }*/

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
}
