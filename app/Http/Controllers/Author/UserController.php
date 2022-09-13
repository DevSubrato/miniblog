<?php

namespace App\Http\Controllers\Author;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function profile()
    {
        $user = Auth::user();
        return view('author.profile',compact('user'));

    }

    public function profile_update(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            
        ]);
        $user=Auth()->user();
        $image=$request->file('image');
        

        if(is_file('uploads/user'.$user->image)){
            unlink('uploads/user'.$user->image);
        }

        if(isset($image)){
            $currentdate=Carbon::now()->toDateString();
            $imagename=$currentdate.'.'.$image->getClientOriginalExtension();;
            if(!file_exists('uploads/user')){
                mkdir('uploads/user',077,true);
            }
            $image->move('uploads/user',$imagename);
        }else{
            $imagename= $user->image;
        }
        
        $user->name = $request->name;
        $user->email = $request->email;
        $user->image = $imagename;
        $user->password = Hash::make($request->password);
        $user->description = $request->description;
        $user->save();
        Toastr::info('Your profile updated successfully','updated');
      
        return redirect()->route('author.profile');
    }

    public function destroy(User $user)
    {
        //
    }
}
