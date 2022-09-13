<?php

namespace App\Http\Controllers\Admin;


use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teams= Team::orderBy('created_at','DESC')->get();
        return view('admin.team.index',compact('teams'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.team.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
        ]);
        $image=$request->file('image');
        $slug=str_slug($request->name);
    
        if(isset($image)){
            $currentdate=Carbon::now()->toDateString();
            $imagename=$slug.'-'.$currentdate.'.'.$image->getClientOriginalExtension();
            if(!file_exists('uploads/team')){
                mkdir('uploads/team',077,true);
            }
            $image->move('uploads/team',$imagename);
        }else{
            $imagename='default.png';
        }
        $team=new Team();
        $team->name = $request->name;
        $team->slug = $slug;
        $team->email = $request->email;
        $team->facebook = $request->facebook;
        $team->instagram = $request->instagram;
        $team->twitter = $request->twitter;
        $team->description = $request->description;
        $team->image = $imagename;
        Toastr::success('Team Member Added Successfully','success');
        $team->save();
    
        
        return redirect()->route('admin.team.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $team = Team::find($id);
        return view('admin.team.edit',compact('team'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
        ]);

        $team=Team::find($id);
        $image=$request->file('image');
        $slug=str_slug($request->name);

        if(file_exists('uploads/post'.$team->image)){
            unlink('uploads/post'.$team->image);
        }
    
        if(isset($image)){
            $currentdate=Carbon::now()->toDateString();
            $imagename=$slug.'-'.$currentdate.'.'.$image->getClientOriginalExtension();
            if(!file_exists('uploads/team')){
                mkdir('uploads/team',077,true);
            }
            $image->move('uploads/team',$imagename);
        }else{
            $imagename=$team->image;
        }
        
        $team->name = $request->name;
        $team->slug = $slug;
        $team->email = $request->email;
        $team->facebook = $request->facebook;
        $team->instagram = $request->instagram;
        $team->twitter = $request->twitter;
        $team->description = $request->description;
        $team->image = $imagename;
        $team->save();

        toastr::info('info','team updated successfully');
        return redirect()->route('admin.team.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Team::find($id)->delete();
        return redirect()->route('admin.team.index');
    }
}
