<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Session;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (!auth()->user()->can('picklist.view')) {
        abort(403, 'Unauthorized action.');
    }
    $model=Session::all();
    return view('admin.session.index',compact('model'));
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      if (!auth()->user()->can('picklist.create')) {
        abort(403, 'Unauthorized action.');
    }
    return view('admin.session.form');
}

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if (!auth()->user()->can('picklist.create')) {
        abort(403, 'Unauthorized action.');
    }
    $validator = $request->validate([
        'name' => 'required', 'max:255',
        'year' => 'required', 'max:255',
    ]);
    $session=new Session;
    $session->name =$request->name;
    $session->year =$request->year;
    $session->save();

    return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Session Created'), 'goto' => route('admin.picklist.session.index')]);
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
        if (!auth()->user()->can('picklist.update')) {
            abort(403, 'Unauthorized action.');
        }
        $model=Session::find($id);
        return view('admin.session.form',compact('model'));
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
        if (!auth()->user()->can('picklist.update')) {
            abort(403, 'Unauthorized action.');
        }
        $validator = $request->validate([
            'name' => 'required', 'max:255',
            'year' => 'required', 'max:255',
        ]);
        $session=Session::find($id);
        $session->name =$request->name;
        $session->year =$request->year;
        $session->save();

        return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Session Updated'), 'goto' => route('admin.picklist.session.index')]);
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        if (!auth()->user()->can('picklist.delete')) {
            abort(403, 'Unauthorized action.');
        }
        if (request()->ajax()) {

            $session = Session::find($id);
            $session->delete();
            return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Session Deleted'),'load'=>'return']);
        }
    }
}
