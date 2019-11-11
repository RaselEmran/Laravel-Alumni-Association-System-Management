<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Batch;

class BatchController extends Controller
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
    $model=Batch::all();
    return view('admin.batch.index',compact('model'));
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
    return view('admin.batch.form');
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
    $batch=new Batch;
    $batch->name =$request->name;
    $batch->year =$request->year;
    $batch->save();

    return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Batch Created'), 'goto' => route('admin.picklist.batch.index')]);
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
    $model=Batch::find($id);
    return view('admin.batch.form',compact('model'));
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
        $batch=Batch::find($id);
        $batch->name =$request->name;
        $batch->year =$request->year;
        $batch->save();

        return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Batch Updated'), 'goto' => route('admin.picklist.batch.index')]);
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

        $batch = Batch::find($id);
        $batch->delete();
        return response()->json(['success' => true, 'status' => 'success', 'message' => _lang('Batch Deleted'),'load'=>'return']);
    }
}
}
