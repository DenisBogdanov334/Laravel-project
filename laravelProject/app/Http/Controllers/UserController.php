<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use Image;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;
use App\User;

class UserController extends Controller
{
    //
    public function profile()
    {
        return view('profile', array('user' => Auth::user()));
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }

    public function update_avatar(Request $request,$id)
    {
        //Handle file upload
        if($request->hasFile('avatar')){
            $file = $request->file('avatar');
            //get filename with extension
            $fileNameWithExt = $request->file('avatar')->getClientOriginalName();
            //get just filename
            $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            //get extension
            $extension = $request->file('avatar')->getClientOriginalExtension();
            //generate filename
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //save
            $img = \Image::make($file);
            $img->save('storage/avatars/'.$fileNameToStore);
        }
        else{
            $fileNameToStore = 'noImage.Jpg';
        }
        $user = User::find($id);
        $user->avatar = $fileNameToStore;
        $user->save();

        return redirect('/profile')->with('success', 'Image Updated');
    }
}
