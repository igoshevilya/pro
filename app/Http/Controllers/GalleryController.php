<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Gallery;
use App\Photo;
use Illuminate\Support\Facades\Auth;


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
      /*   $gallery = Gallery::create([
            'title' => $request->gallery['title'],
            'description' => $request->gallery['description'],
            'user_id' => Auth::id(),
        ]); */

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

    public function update(Request $request, $id)
    {
        $gallery = Gallery::with('photos')->find($id);
        $gallery->title = $request->gallery['title'];
        $gallery->description = $request->gallery['description'];
        $gallery->save();

        return $gallery;
    }

    public function status(Request $request, $id)
    {
        $gallery = Gallery::find($id);
        $gallery->active = !$gallery->active;
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
