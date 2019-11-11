<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Session;
use App\Batch;
use App\Depertment;

class DepertmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()->can('depertment.view')) {
            abort(403, 'Unauthorized action.');
        }
        $session =Session::all()->pluck('year', 'id')->prepend(_lang('Select One'), '');
        return view('admin.depertment.index',compact('session'));
    }


    public function info(Request $request)
    {
        if ($request->ajax()) {
           $model =Depertment::where('session_id',$request->session_id)->get();
           return view('admin.depertment.list',compact('model'));
       }
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       if (!auth()->user()->can('depertment.create')) {
        abort(403, 'Unauthorized action.');
    }
    $session =Session::all()->pluck('year', 'id')->prepend(_lang('Select One'), '');
    $batch =Batch::all()->pluck('name', 'id')->prepend(_lang('Select One'), '');
    return view('admin.depertment.form',compact('session','batch'));
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!auth()->user()->can('depertment.create')) {
            abort(403, 'Unauthorized action.');
        }
        if ($request->ajax()) {
            $validator = $request->validate([
                'session_id' => 'required', 'integer',
                'batch_id' => 'required', 'integer',
                'name'=>'required',
                'email'=>'required|email',
                'hostel'=>'required|max:255',
                'phone'=>'required',
                'roll_no'=>'required|unique:depertments',
            ]);

            $model =new Depertment;
            $model->session_id =$request->session_id;
            $model->batch_id =$request->batch_id;
            $model->name =$request->name;
            $model->email =$request->email;
            $model->roll_no =$request->roll_no;
            $model->phone =$request->phone;
            $model->hostel =$request->hostel;
            $model->father_name =$request->father_name;
            $model->mother_name =$request->mother_name;
            $model->address =$request->address;
            $model->save();
            return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Student Added Succesfully'), 'goto' => route('admin.depertment.index')]);
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
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      if (!auth()->user()->can('depertment.update')) {
        abort(403, 'Unauthorized action.');
    }
    $session =Session::all()->pluck('year', 'id')->prepend(_lang('Select One'), '');
    $batch =Batch::all()->pluck('name', 'id')->prepend(_lang('Select One'), '');
    $model=Depertment::find($id);
    return view('admin.depertment.form',compact('session','batch','model'));
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
        if (!auth()->user()->can('depertment.update')) {
            abort(403, 'Unauthorized action.');
        }
        if ($request->ajax()) {
           $validator = $request->validate([
            'session_id' => 'required', 'integer',
            'batch_id' => 'required', 'integer',
            'name'=>'required',
            'email'=>'required|email',
            'hostel'=>'required|max:255',
            'phone'=>'required',
        ]);

           $model =Depertment::find($id);
           $model->session_id =$request->session_id;
           $model->batch_id =$request->batch_id;
           $model->name =$request->name;
           $model->email =$request->email;
           $model->phone =$request->phone;
           $model->hostel =$request->hostel;
           $model->father_name =$request->father_name;
           $model->mother_name =$request->mother_name;
           $model->address =$request->address;
           $model->save();
           return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Student Update Succesfully'), 'goto' => route('admin.depertment.index')]);
       }
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
          if (!auth()->user()->can('depertment.delete')) {
            abort(403, 'Unauthorized action.');
        }
        if (request()->ajax()) {

            $model = Depertment::find($id);
            $model->delete();
            return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Student Deleted'),'load'=>'return']);
        }
    }
}
