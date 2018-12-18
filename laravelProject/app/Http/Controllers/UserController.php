<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;

class UserController extends Controller
{
    //
    public function profile(){
        return view ('profile', array('user' => Auth::user()));
    }

    public function update_avatar(Request $request){
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');

            $fileNameWithExt = $request->file('avatar')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //get extension
            $extension = $request->file('avatar')->getClientOriginalExtension();
            //generate filename
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //watermark
            $watermark = Image::make('http://localhost/storage/watermark.png');
            //save
            $img = \Image::make($avatar);
            $img->insert($watermark, 'bottom');
            $img-resize(320, 240);
            $img->save('storage/avatars/'.$fileNameToStore);

            $user = Auth::user();
            $user->avatar = $fileNameToStore;
            $user->save();
        }
        else{
            $fileNameToStore = 'noImage.Jpg';
        }
        return view('profile', array('user' => Auth::user()) );
    }
}
