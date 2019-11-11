<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Team;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()->can('team.view')) {
        abort(403, 'Unauthorized action.');
        }
        $model =Team::all();
        return view('admin.team.index',compact('model'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       if (!auth()->user()->can('team.create')) {
        abort(403, 'Unauthorized action.');
        }
        return view('admin.team.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       if (!auth()->user()->can('team.create')) {
        abort(403, 'Unauthorized action.');
        }
        $validator = $request->validate([
            'name' => ['required', 'max:255'],
            'designation' => ['required', 'max:255'],
            'image' => 'required|mimes:jpeg,bmp,png,jpg|max:2000',
        ]);

        $team =new Team;
        if($request->hasFile('image')) {
          $storagepath = $request->file('image')->store('public/team');
          $fileName = basename($storagepath);
          $team->image = $fileName;
      }
      $team->name =$request->name;
      $team->designation =$request->designation;
      $team->fb =$request->fb;
      $team->tw =$request->tw;
      $team->inst =$request->inst;
      $team->google =$request->google;
      $team->save();

      return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Team Created'), 'goto' => route('admin.team.index')]);
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
       if (!auth()->user()->can('team.update')) {
        abort(403, 'Unauthorized action.');
        }
        $model =Team::find($id);
        return view('admin.team.form',compact('model'));
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
      if (!auth()->user()->can('team.update')) {
        abort(403, 'Unauthorized action.');
        }
      $validator = $request->validate([
         'name' => ['required', 'max:255'],
         'designation' => ['required', 'max:255'],
         'image' => 'mimes:jpeg,bmp,png,jpg|max:2000',
    ]);

     $team =Team::findOrfail($id);

     if ($request->hasFile('image')) {
      $storagepath = $request->file('image')->store('public/team');
      $fileName = basename($storagepath);
      $team->image = $fileName;

        //if file chnage then delete old one
      $oldFile = $request->get('oldimage', '');
      if ($oldFile != '') {
        $file_path = "public/team" . $oldFile;
        Storage::delete($file_path);
         }

        }
        else {
        $team->image = $request->get('oldimage', '');
        }

          $team->name =$request->name;
          $team->designation =$request->designation;
          $team->fb =$request->fb;
          $team->tw =$request->tw;
          $team->inst =$request->inst;
          $team->google =$request->google;
          $team->save();

        return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Team Updated'), 'goto' => route('admin.team.index')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
       public function destroy(Request $request,$id)
        {
          if (!auth()->user()->can('team.delete')) {
          abort(403, 'Unauthorized action.');
          }
          if ($request->ajax()) {
            $team = Team::find($id);
            unlink('storage/team/'.$team->image);
            $team->delete();
            if ($team) {
                return response()->json(['success' => true, 'status' => 'success', 'message' => 'Team Information Delete Successfully.','load'=>true]);
         }
     }
}
}
