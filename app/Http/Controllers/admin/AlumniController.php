<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Alumni;
use App\Schedule;
use Session;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (!auth()->user()->can('alumni.view')) {
        abort(403, 'Unauthorized action.');
    }
    $model = Alumni::all();
    return view('admin.alumni.index',compact('model'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      if (!auth()->user()->can('alumni.create')) {
        abort(403, 'Unauthorized action.');
    }
    return view('admin.alumni.create');
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if (!auth()->user()->can('alumni.create')) {
        abort(403, 'Unauthorized action.');
    }
    $validator = $request->validate([
        'title' => 'required', 'max:255',
        'open_date' => 'required', 'date',
        'close_date' => 'required', 'date',
    ]);

    $alumni =new Alumni;
    $alumni->title =$request->title;
    $alumni->open_date =$request->open_date;
    $alumni->close_date =$request->close_date;
    $alumni->save();
    Session::put('alumni_id', $alumni->id);

    $others =Alumni::where('id','!=',$alumni->id)->get();
    foreach ($others as $key => $value) {
        $check = Alumni::find($value->id);
        $check->status = false;
        $check->save(); 
    }

    return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Successfull, Redirect To Schedule Page'), 'goto' => route('admin.alumni.schedule')]);
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function schedule(Request $request)
    {
       if (!auth()->user()->can('alumni.create')) {
        abort(403, 'Unauthorized action.');
    }
    $id = Session::get('alumni_id');
    if (!$id) {
        return redirect()->back();
    }
    return view('admin.alumni.schedule');
}

public function schedule_value(Request $request)
{ 
    if (!auth()->user()->can('alumni.create')) {
        abort(403, 'Unauthorized action.');
    }
    if ($request->ajax()) {

        $row =$request->row;
        return view('admin.alumni.schedule_value',compact('row'));
    }
}

public function post(Request $request)
{
    if (!auth()->user()->can('alumni.create')) {
        abort(403, 'Unauthorized action.');
    }
    $day =$request->day;
    foreach ($day as $key => $value) {
        $schedule =new Schedule;
        $schedule->alumni_id =Session::get('alumni_id');
        $schedule->day =$request->day[$key];
        $schedule->date =$request->date[$key];
        $schedule->plan =$request->plan[$key];
        $schedule->save();
    }
    
    $request->session()->flash('alumni_id');
    return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Successfull'), 'goto' => route('admin.alumni.index')]);

}

public function status(Request $request, $value, $id) {

   if (!auth()->user()->can('alumni.update')) {
    abort(403, 'Unauthorized action.');
}

if (request()->ajax()) {
    $alumni = Alumni::find($id);
    $alumni->status = $value;
    $alumni->save();
    $others =Alumni::where('id','!=',$id)->get();
    foreach ($others as $key => $value) {
        $check = Alumni::find($value->id);
        $check->status = false;
        $check->save(); 
    }


    return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Status Updated'),'load'=>true]);
}
}
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       if (!auth()->user()->can('alumni.view')) {
        abort(403, 'Unauthorized action.');
    }
    $model =Alumni::find($id);
    return view('admin.alumni.show',compact('model'));
}

public function schedule_edit(Request $request,$id)
{
   if (!auth()->user()->can('alumni.update')) {
    abort(403, 'Unauthorized action.');
}

$model =Alumni::find($id);
return view('admin.alumni.schedule_edit',compact('model'));

}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       if (!auth()->user()->can('alumni.update')) {
        abort(403, 'Unauthorized action.');
    }
    $model =Alumni::find($id);
    return view('admin.alumni.create',compact('model'));
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
        if (!auth()->user()->can('alumni.update')) {
            abort(403, 'Unauthorized action.');
        }
        $validator = $request->validate([
            'title' => 'required', 'max:255',
            'open_date' => 'required', 'date',
            'close_date' => 'required', 'date',
        ]);

        $alumni =Alumni::find($id);
        $alumni->title =$request->title;
        $alumni->open_date =$request->open_date;
        $alumni->close_date =$request->close_date;
        $alumni->save();
        return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Successfull'), 'goto' => route('admin.alumni.index')]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
