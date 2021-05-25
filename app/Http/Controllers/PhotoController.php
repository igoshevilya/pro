<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use File;
use Image;
use App\Gallery;
use App\Photo;

class PhotoController extends Controller
{
    public function uploadPhotos(Request $request)
    {
        if (count($request->images) > 0) {
            foreach ($request->images as $image) {

        $gallery = Gallery::find($request->gallery_id);
        $name=$image->getClientOriginalName();
                $name = time().'_'.$name;
                $info = Image::make($image)->save(public_path('/images/').$name);
               
                $thumbnail= 'thumbnail_'.$name;
                Image::make($image)
                ->fit(450, 300)
                ->save(public_path('/thumbnail/').$thumbnail);
                

    $photo= new Photo();
    $photo->gallery_id =  $gallery->id;

    $photo->url = 5;
    $photo->file_name = $name;
 
    $photo->width =  $info->width();
    $photo->height =$info->height();
    $photo->size = $info->filesize();
    $photo->save();
}}

        return $photo;
    }

    public function update(Request $request)
    {
        $photo = Photo::with('photoed')->find($request->photo['id']);

        $location = storage_path().'/app/public/galleries/' . $photo->photoed->id . '/' . $photo->file_name;
        $img = Image::make($request->photo['base64'])->interlace();

        $maxWidth = 2560; // your max width
        $maxHeight = 2560; // your max height
        if($img->height() > $maxHeight || $img->width() > $maxHeight){
            $img->height() > $img->width() ? $width=null : $height=null;
            $img->resize($maxWidth, $maxHeight, function ($constraint) {
                $constraint->aspectRatio();
            });
        }

        //Check if folder exists before saving
        File::exists(storage_path('app/public/galleries')) or File::makeDirectory(storage_path('app/public/galleries'));
        File::exists(storage_path('app/public/galleries/' . $photo->photoed->id)) or File::makeDirectory(storage_path('app/public/galleries/' . $photo->photoed->id));
        $img->save($location);

        $photo->url = '/storage/galleries/' . $photo->photoed->id . '/' . $photo->file_name . '?v='. time();
        $photo->width = $img->width();
        $photo->height = $img->height();
        $photo->size = $img->filesize();
        $photo->save();

        return $photo;
    }

    public function updateAttr(Request $request)
    {
        $photo = Photo::find($request->photo['id']);
        $photo->title = $request->photo['title'];
        $photo->description = $request->photo['description'];
        $photo->save();

        return $photo;
    }

    public function order(Request $request)
    {
        $gallery = Gallery::with(['photos'])->find($request->galleryId);
        $photo = $gallery->photos->where('order', $request->oldOrder)->first();
        $photo->order = $request->newOrder;

        $reorder = $request->newOrder < $request->oldOrder?'increment':'decrement';
        $between = $request->newOrder < $request->oldOrder?[$request->newOrder, $request->oldOrder]:[$request->oldOrder, $request->newOrder];

        $photos = Photo::whereIn('id', $gallery->photos->pluck('id')->toArray())
            ->where('id', '!=', $photo->id)
            ->whereBetween('order', $between)
            ->$reorder('order');
        $photo->save();

        return 'success';

    }

    public function status(Request $request, $id)
    {
        $photo = Photo::find($id);
        $photo->active = !$photo->active;
        $photo->save();

        return $photo;
    }

    public function destroy($id)
    {

        $photo = Photo::find($id);
     /*    $filePath = storage_path('\app\public\\'.str_replace('/storage/', '', $photo->url));
        $filePath = str_replace('/', '\\', $filePath);
        try{
            unlink($filePath);
        }catch (\Exception $exception){
            echo('File doesn\'t exist');
        }
 */
        $photo->delete();

        return 'success';
    }
}
