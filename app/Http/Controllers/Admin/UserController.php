<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Brian2694\Toastr\Facades\Toastr;

class UserController extends Controller
{
    
    public function index()
    {
        $users = User::where('role_id',2)->latest()->get();
        return view('admin.user.index', compact('users'));
    }

    public function destroy($id)
    {
        $user =User::find($id);
        $user->delete();
        return redirect()->back();
    }
    public function profile()
    {
        $user = Auth()->user();
        return view('admin.user.profile',compact('user'));
    }
    public function profile_update(Request  $request)
    {
        $this->validate($request,[
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'image' => 'required|max:2048',
            
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
        Toastr::success('success','profile updated successfully');
        
        return redirect()->back();
    }
        
    
}
