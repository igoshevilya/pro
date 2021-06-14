<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Gallery;
use App\User;
use App\Photo;
use Image;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
use App\Http\Resources\PhotoResource;
class GalleryController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $gallery = Gallery::where('user_id', $user->id)->get();
        
        return view ('photographer.cabinet.myprofile.gallery.index',[response()->json( $gallery)]);

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
        return view ('photographer.cabinet.myprofile.gallery.show');
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


    public function destroy($id)
    {
        $gallery = Gallery::find($id);
        $gallery->delete();
    }

    public function uploadPhotos(Request $request)
    {
        if (count($request->images) > 0) {
            foreach ($request->images as $image) {

                $gallery = Gallery::find($request->gallery_id);
                $name = $image->getClientOriginalName();
                $name = time() . '_' . $name;
                $info = Image::make($image)->save(public_path('/images/') . $name);

                $thumbnail = 'thumbnail_' . $name;
                Image::make($image)
                    ->fit(450, 300)
                    ->save(public_path('/thumbnail/') . $thumbnail);


                $photo = new Photo();
                $photo->gallery_id = $gallery->id;

                $photo->user_id = Auth::id();
                $photo->file_name = $name;

                $photo->width =  $info->width();
                $photo->height = $info->height();
                $photo->size = $info->filesize();
                $photo->save();
            }
        }
        return $photo;
    }







    public function destroyphoto($id)
    {
        $photo = Photo::find($id);
        $photo->delete();
        return 'success';
    }
}
