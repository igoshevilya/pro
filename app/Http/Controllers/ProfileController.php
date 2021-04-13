<?php
namespace App\Http\Controllers;
use Auth;
use App\User;
use Illuminate\Http\Request;

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
}