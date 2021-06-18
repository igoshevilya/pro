<?php
namespace App\Http\Controllers;
use Auth;
use Image;
use File;
use App\User;
use App\Photo;
use App\Gallery;
use App\Service;
use App\Review;
use App\ClientReview;
use App\Category;
use Illuminate\Http\Request;
use App\Avatar;
use App\Photographer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function getProfile($user)
    {
        $user = User::where('user',$user)->first();
        if(!$user){
            abort(404);
        }
        if($user->hasRole('user')){
        $type = 1;}
        if($user->hasRole('photographer')){
            $type = 2;}
         $specs = explode(',', $user->photographer->dopspec); 
         
        // dd($spec); 
       return view('profile.index', compact('user','type','specs'));
    }
 
    
    public function setting()
    {
        if(Auth::user()->hasRole('user')){
            $type = 1;}
            if(Auth::user()->hasRole('photographer')){
                $type = 2;}
        return view('profile.edit',compact('type'));
    }
    public function postEdit(Request $request)
    {   $user =Auth::id();
        $validatedData = $request->validate([ 
            'first_name' => ['required','string','min:2', 'max:20'],
            'last_name' => ['required', 'string', 'min:2', 'max:20'],
            'email' => 'required|email|unique:users,email,'.$user, 
            'phone' => ['min:16','max:16',],
            'city' => ['string', 'min:3', ],
            'dr' => ['min:10','max:10',],
        ]);


        Auth::user()->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'city' => $request->input('city'),
            'dr' => $request->input('dr'),
            'phone' => $request->input('phone'),
            ]);

        return redirect()
               ->route('setting')
               ->with('success', 'Профиль успешно обновлен!');
    }

    public function avatar(Request $request)
    {
        $this->validate($request,[
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        if(Auth::user()->avatar){
            $oldimage = Avatar::where('user_id', Auth::user()->id)->firstOrFail();
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

        $img = new Avatar;
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

    public function getservice($user)
    {     
        $user = User::where('user',$user)->first();
        if(!$user){
            abort(404);
        }

        return Service::where('user_id', $user->id)->get();
    }

    public function getreview($user)
    {     
        $user = User::where('user',$user)->first();
        if(!$user){
            abort(404);
        }
        if($user->hasRole('photographer'))
        {$rev = Review::where('photograph_id', $user->id)->get();
        $rev-> load('client');
        $rev-> load('avatar');}

        if($user->hasRole('user'))
        {$rev = ClientReview::where('client_id', $user->id)->get();
        $rev-> load('photograph');
        $rev-> load('avatar');}
        return $rev;

        
    }
    public function applicationform()
    {  

            
        return view('profile.applicationform', ['categories' => Category::all()]); 
    }

    public function postform(Request $request)
    {     
        $validatedData = $request->validate([    
            'phone' => ['min:16','max:16',],
         
        ]);
        $photographer = new Photographer;
        $photographer->user_id = Auth::id();
        
        $photographer->spec = $request->input('spec');
        if($request->input('category')){
        $arrayTostring = implode(',',$request->input('category'));
        $photographer->dopspec =  $arrayTostring;}
        $photographer->price = $request->input('price');
        if($request->input('gender')){
            $photographer->gender = $request->input('gender');  
        }else{
            $photographer->gender = 'Male';  
        }
        
        $photographer->experience = $request->input('experience');
        $photographer->portfolio = $request->input('portfolio');
        //телефон
        $photographer->about = $request->input('about');
        $photographer->vk = $request->input('vk');
        $photographer->inst = $request->input('inst');
        $photographer->fb = $request->input('fb'); 
        $photographer->status = 1;            
        $photographer->save();

        Auth::user()->update([          
            'phone' => $request->input('phone'),
            ]);



        return redirect()
        ->route('application.form')
        ->with('success', 'Спасибо!');
        
    }

}