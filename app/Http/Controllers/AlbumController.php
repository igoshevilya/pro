<?php

namespace App\Http\Controllers;

use App\Album;
use App\Photo;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $albums = Album::where('user_id', $user->id)->get();

       /*  foreach ($albums as $album) {
            $album['latestPhoto'] = Photo::where('album_id', $album->id)->latest()->first();
        } */
        return view('photographer.cabinet.myprofile.album.index', compact('albums'));
      
    }

    public function store(Request $request)
    {
        $album = new Album();
        $album->user_id = Auth::id();
        $album->title = $request->title;
        $album->desc = $request->desc;
        $album->save();
      
        return redirect(route('album.show',$album->id))->with('success', 'Альбом создан, загрузите фотографии.');
    }

    public function show($id)
    {
        $album = Album::with('photos')->where('id', $id)->first();
        $photo = $album->photos;

       
        //$photo = response()->json($album, 200);
      // dd(json_encode($photo));
        return view('photographer.cabinet.myprofile.album.show', [ $album, $photo]);
        //return response()->json([            'albums' => $album        ]);
    }
}
