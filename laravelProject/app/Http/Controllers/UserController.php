<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //
    public function profile(){
        return view ('profile', array('user' => Auth::user()) );
    }
    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function update_avatar(Request $request){

      /*  if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            $filename = Image::make($avatar)->resize(250,250)->save( public_path('/uploads/avatars/' . $filename));

            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }
      */
        if($request->hasFile('avatar')){
            //get filename with extension
            $fileNameWithExt = $request->file('avatar')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //get extension
            $extension = $request->file('avatar')->getClientOriginalExtension();
            //generate filename
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //save
            $path = $request->file('avatar')->storeAs('public/uploads/avatars', $fileNameToStore);
        }
        return view('profile', array('user' => Auth::user()) );
    }
}
