<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function edit(Setting $setting)
    {
        $setting = Setting::first();
        return view('admin.setting.edit',compact('setting'));
    }

    public function update(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'copyright' => 'required',
        ]);

        $setting = Setting::first();
        $image=$request->file('image');
        $slug=str_slug($request->name);

        if(isset($image)){
            $currentdate=Carbon::now()->toDateString();
            $imagename=$slug.'-'.$currentdate.'.'.$image->getClientOriginalExtension();

            if(!file_exists('uploads/setting')){
                mkdir('uploads/setting',077,true);
            }
            $image->move('uploads/setting',$imagename);
        }else{
            $imagename= 'default.png';
        }
        
        $setting = Setting::first();
        $setting->name=$request->name;
        $setting->image=$imagename;
        $setting->description=$request->description;
        $setting->facebook=$request->facebook;
        $setting->instagram	=$request->instagram;
        $setting->reddit=$request->reddit;
        $setting->twitter=$request->twitter;
        $setting->email=$request->email;
        $setting->phone=$request->number;
        $setting->address=$request->address;
        $setting->copyright=$request->copyright;

        $setting->save();
        return redirect()->back();
    }
}


