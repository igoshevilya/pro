<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use File;
use Image;
use App\Gallery;
use App\Photo;
use Illuminate\Support\Facades\Auth;

class PhotoController extends Controller
{
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







    public function destroy($id)
    {
        $photo = Photo::find($id);
        $photo->delete();
        return 'success';
    }
}
