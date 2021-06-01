<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Gallery;
use App\User;
use App\Photo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use App\Http\Resources\PhotoResource;
class GalleryController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $gallery = Gallery::where('user_id', $user->id)->get();
        
        return view ('photographer.cabinet.gallery.index',[response()->json( $gallery)]);

    }

    public function getgallery()
    { 
        $user = Auth::user();
        return Gallery::where('user_id', $user->id)->get()
        ->map(function ($gallery, $key) {
            $gallery->active = $gallery->active?true:false;
            $gallery->photos->map(function ($photo, $key) {
                $photo->active = $photo->active?true:false;
               return $photo;
            });
           
            return $gallery;
        });
    }

    public function store(Request $request)
    {
        $gallery = new Gallery;
        $gallery->user_id = Auth::id();
        $gallery->title = $request->gallery['title'];
        $gallery->description = $request->gallery['description'];
        $gallery->save();
        $gallery->photos = [];
        return $gallery;
    }


    public function show($id)
    {
        return view ('photographer.cabinet.gallery.show');
    }

    public function getphoto($id)
    {


     $gallery = Gallery::with('photos')->find($id);

        return $gallery;
    }

    public function getProfile($user)
    {
        $user = User::where('user',$user)->first();
        if(!$user){
            abort(404);
        }
       return view('profile.index', compact('user'));
    }

    public function getphotouser($user)
    {
     /*   
        $gallery=$user->gallery->Gallery::all(); */
        $user = User::where('user',$user)->first();
        if(!$user){
            abort(404);
        }
      /*   $gallery = Gallery::where('user_id',$user->id)->get(); */
       // $gallery = Gallery::all()->photos();
       // $gallery = Gallery::with('photos')->find(3);
      
      // $gallery = collapse($gallery);
       //$gallery = Arr::pluck($gallery, 'photos');
       //$gallery = Arr::collapse($gallery);
       //$gallery = $gallery;
   // dump($gallery, $photo);
    // dump($user->id);
       
    
    
   // $gallery = Gallery::where('user_id', $user->id)->with('photos')->get(); return $gallery;



   $photo = Photo::where('user_id', $user->id)->get();

   return $photo;

      // return PhotoResource::collection(Gallery::where('user_id', $user->id)->with('photos')->get());
    }
   /*  public function getphotouser()
    {
       
        $gallery = Gallery::all()->photos();

        return $gallery;
    } */

    public function update(Request $request, $id)
    {
        $gallery = Gallery::with('photos')->find($id);
        $gallery->title = $request->gallery['title'];
        $gallery->description = $request->gallery['description'];
        $gallery->save();

        return $gallery;
    }


    public function destroy($id)
    {
        $gallery = Gallery::find($id);
        $gallery->delete();

        return 'success';
    }
}
