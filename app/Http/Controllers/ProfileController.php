<?php
namespace App\Http\Controllers;
use Auth;
use Image;
use File;
use App\User;
use App\Photo;
use App\Gallery;
use Illuminate\Http\Request;
use App\Userprofile;

class ProfileController extends Controller
{
    public function getProfile($user)
    {
        $user = User::where('user',$user)->first();
        if(!$user){
            abort(404);
        }
       return view('profile.index', compact('user'));
    }

    public function getEdit()
    {  
                return view('profile.edit');
    }
    public function postEdit(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'alpha|max:50',
            'last_name' => 'alpha|max:50',
                   ]);

        Auth::user()->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            ]);

        return redirect()
               ->route('profile.edit')
               ->with('info', 'Профиль успешно обновлен!');
    }

    public function avatar(Request $request)
    {
        $this->validate($request,[
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        if(Auth::user()->userprofile){
            $oldimage = Userprofile::where('user_id', Auth::user()->id)->firstOrFail();
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
        ->save(public_path('/avatar/').$thumbnail);
        $image->move(public_path('/avatar'), $imageName);

        $img = new Userprofile;
        $img->user_id = Auth::user()->id;
        $img->image = 'avatar/'.$imageName;
        $img->thumbnail = 'avatar/'.$thumbnail;
        $img->save();
    }

    public function getphotouser($user)
    {     
        $user = User::where('user',$user)->first();
        if(!$user){
            abort(404);
        }
        return Photo::where('user_id', $user->id)->get();  
    }
    public function getgalleryuser($user)
    {     
        $user = User::where('user',$user)->first();
        if(!$user){
            abort(404);
        }
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
    public function getgalleryphoto($id)
    {     
        

        return Gallery::with('photos')->find($id);
    }
    

}