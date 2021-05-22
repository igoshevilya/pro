<?php

namespace App\Http\Controllers;

use App\Photo;
use Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Str;
use Illuminate\Http\Response;
use Image;
use File;
use App\User;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class PhotoController extends Controller
{

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
                

    $image= new Photo();
    $image->file_name = $name;
    $image->album_id = $request->albumid;
   
    $image->save();
}}
        return response()->json($image, 200);
   }
}
